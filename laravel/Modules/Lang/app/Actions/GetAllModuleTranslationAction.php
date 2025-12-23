<?php

declare(strict_types=1);

namespace Modules\Lang\Actions;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;
use Modules\Xot\Actions\Module\GetModulePathByGeneratorAction;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

use function Safe\glob;

class GetAllModuleTranslationAction
{
    use QueueableAction;

    /**
     * Restituisce il path completo del file di traduzione dato un key.
     */
    public function execute(): array
    {
        $lang = session()->get('locale');
        if (is_string($lang) && in_array($lang, ['it', 'en'], strict: true)) {
            app()->setLocale($lang);
        }

        $lang = app()->getLocale();
        $path = base_path('Modules/*/lang/' . $lang . '/*.php');
        $files = glob($path);
        $files = Arr::map($files, function ($file) {
            $module_low = Str::of($file)
                ->between('Modules/', '/lang/')
                ->lower()
                ->toString();
            return [
                'key' => $module_low . '::' . basename($file, '.php'),
                'path' => $file,
            ];
        });
        return $files;
    }
}
