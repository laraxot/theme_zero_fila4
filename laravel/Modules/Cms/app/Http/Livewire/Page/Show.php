<?php

declare(strict_types=1);

namespace Modules\Cms\Http\Livewire\Page;

use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Modules\Cms\Models\Page;
use Modules\Xot\Services\ThemeService;

class Show extends Component
{
    /**
     * Lo slug della pagina da visualizzare.
     *
     * @var string
     */
    public string $slug;

    /**
     * Se utilizzare la cache per i contenuti.
     *
     * @var bool
     */
    public bool $cache = true;

    /**
     * Il tema da utilizzare.
     *
     * @var string|null
     */
    public null|string $theme = null;

    /**
     * Se mostrare informazioni di debug.
     *
     * @var bool
     */
    public bool $debug = false;

    /**
     * I contenuti della pagina.
     *
     * @var array<string, mixed>
     */
    protected array $pageContent = [];

    /**
     * Regole di validazione per i parametri.
     *
     * @return array<string, string>
     */
    protected function rules(): array
    {
        return [
            'slug' => 'required|string',
            'cache' => 'boolean',
            'theme' => 'nullable|string',
            'debug' => 'boolean',
        ];
    }

    /**
     * Carica i contenuti della pagina.
     */
    public function mount(): void
    {
        $this->loadPageContent();
    }

    /**
     * Carica i contenuti della pagina, eventualmente dalla cache.
     */
    protected function loadPageContent(): void
    {
        // Chiave per la cache
        $cacheKey = 'page_content_' . $this->slug . '_' . ($this->theme ?? ThemeService::getTheme());

        // Se la cache è abilitata, tenta di recuperare dalla cache
        if ($this->cache) {
            $cached = Cache::remember($cacheKey, now()->addHours(24), $this->fetchPageContent(...));
            $this->pageContent = is_array($cached) ? $cached : [];
        } else {
            $this->pageContent = $this->fetchPageContent();
        }
    }

    /**
     * Recupera i contenuti della pagina dal database.
     *
     * @return array<string, mixed>
     */
    protected function fetchPageContent(): array
    {
        try {
            // Recupera la pagina dal database
            $page = Page::where('slug', $this->slug)->where('lang', app()->getLocale())->first();

            if (!$page) {
                return ['error' => 'Page not found', 'slug' => $this->slug];
            }

            // Recupera e processa i contenuti della pagina
            return [
                'title' => $page->title,
                'subtitle' => null, // Property doesn't exist in Page model
                'content' => $page->content,
                'meta' => [
                    'description' => null, // Property doesn't exist in Page model
                    'keywords' => null, // Property doesn't exist in Page model
                ],
                'blocks' => $page->content_blocks ?? [],
                'layout' => 'default',
            ];
        } catch (Exception $e) {
            if ($this->debug) {
                return [
                    'error' => $e->getMessage(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                ];
            }

            return ['error' => 'An error occurred while loading the page'];
        }
    }

    /**
     * Renderizza la vista con i contenuti della pagina.
     */
    public function render(): View
    {
        return view('cms::livewire.page.show', [
            'pageContent' => $this->pageContent,
            'theme' => $this->theme ?? ThemeService::getTheme(),
        ]);
    }
}
