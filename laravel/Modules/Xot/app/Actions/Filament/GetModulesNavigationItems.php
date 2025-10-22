<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Filament;

use Exception;
use Illuminate\Support\Str;
use Webmozart\Assert\Assert;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use Filament\Navigation\NavigationItem;
use Modules\Tenant\Services\TenantService;
use Spatie\QueueableAction\QueueableAction;
use Modules\Xot\Actions\Module\GetModulePathByGeneratorAction;
use function Safe\json_encode;

/**
 * Classe per gestire gli elementi di navigazione per i moduli.
 * Ottimizzata per ridurre memory usage.
 */
class GetModulesNavigationItems
{
    use QueueableAction;

    /**
     * Ottiene gli elementi di navigazione per i moduli.
     *
     * @return array<int, NavigationItem> Array di elementi di navigazione
     */
    public function execute(): array
    {
        $navs = [];

        $modules = TenantService::allModules();
        Assert::isArray($modules, 'TenantService::allModules() deve restituire un array');

        // Pre-load user roles to avoid N+1 queries
        $user = auth()->user();
        
        $userRoles = [];
        if ($user && method_exists($user, 'roles')) {
            try {
                $userRoles = $user->roles()->pluck('name')->toArray();
            } catch (Exception $e) {
                
                $userRoles = [];
            }
        }

        
       
        foreach ($modules as $module) {
            Assert::string($module, 'Il nome del modulo deve essere una stringa');

            $module_low = Str::lower($module);
            Assert::stringNotEmpty($module_low, 'Il nome del modulo convertito in minuscolo non può essere vuoto');

            $configPath = app(GetModulePathByGeneratorAction::class)->execute($module, 'config');
            $configFilePath = $configPath . '/config.php';

            // Verifichiamo che il file esista
            if (!File::exists($configFilePath)) {
              
                continue;
            }

            // Carichiamo la configurazione
            try {
                /** @var array<string, mixed> $config */
                $config = File::getRequire($configFilePath);
                Assert::isArray($config, 'Il file di configurazione deve restituire un array');
            } catch (Exception $e) {
                continue;
            }

            // Estraiamo i valori di configurazione con valori predefiniti
            $icon = $config['icon'] ?? 'heroicon-o-question-mark-circle';
            Assert::string($icon, "L'icona deve essere una stringa");

            $role = $module_low . '::admin';
            Assert::stringNotEmpty($role, 'Il ruolo non può essere vuoto');

            $navigation_sort = $config['navigation_sort'] ?? 1;
            Assert::integerish($navigation_sort, 'navigation_sort deve essere un intero');
            $navigation_sort = (int) $navigation_sort;

            // Check role using pre-loaded roles instead of hasRole() method
           /*
            $hasRole = in_array($role, $userRoles, true);

            // Only create NavigationItem if user has the role (memory optimization)
            if ($hasRole) {
                $nav = NavigationItem::make($module)
                    ->url('/' . $module_low . '/admin')
                    ->icon($icon)
                    ->group('Modules')
                    ->sort($navigation_sort)
                    ->visible(true); // Already checked above

                $navs[] = $nav;
            }
            */

            // Creiamo l'elemento di navigazione
            $nav = NavigationItem::make($module)
                ->url('/' . $module_low . '/admin')
                ->icon($icon)
                ->group('Modules')
                ->sort($navigation_sort)
                ->visible(static function () use ($role): bool {
                    $user = Filament::auth()->user();
                    if (null === $user) {
                        return false;
                    }

                    // Verifichiamo che il metodo hasRole esista
                    if (!method_exists($user, 'hasRole')) {
                        return false;
                    }

                    return (bool) $user->hasRole($role);
                });

            $navs[] = $nav;
        }

        return $navs;
    }

    /**
     * Restituisce la versione cached e minimale dei moduli per UI rendering.
     * Questo evita di hardcodare i moduli nelle viste.
     *
     * @return array<int, array{module:string,module_low:string,icon:string,sort:int}>
     */
    public function getCachedModuleConfigs(): array
    {
        $modules = TenantService::allModules();
        Assert::isArray($modules);

        $cacheKey = 'xot:navigation:modules:' . md5(json_encode($modules));

        /** @var array<int, array{module:string,module_low:string,icon:string,sort:int}> $cached */
        $cached = Cache::get($cacheKey);
        if (is_array($cached)) {
            return $cached;
        }

        // Se non presente in cache, rigenera usando la stessa logica di execute()
        /** @var array<int, array{module:string,module_low:string,icon:string,sort:int}> $regen */
        $regen = Cache::remember($cacheKey, now()->addMinutes(10), function () use ($modules): array {
            $out = [];
            foreach ($modules as $module) {
                Assert::string($module, 'Il nome del modulo deve essere una stringa');
                $module_low = Str::lower($module);
                Assert::stringNotEmpty($module_low, 'Il nome del modulo convertito in minuscolo non può essere vuoto');
                $configPath = app(GetModulePathByGeneratorAction::class)->execute($module, 'config');
                $configFilePath = $configPath . '/config.php';
                if (!File::exists($configFilePath)) {
                    continue;
                }
                try {
                    /** @var array<string, mixed> $config */
                    $config = File::getRequire($configFilePath);
                    Assert::isArray($config);
                } catch (Exception $e) {
                    continue;
                }
                $icon = $config['icon'] ?? 'heroicon-o-cube';
                $navigation_sort = (int) ($config['navigation_sort'] ?? 1);
                $out[] = [
                    'module' => $module,
                    'module_low' => $module_low,
                    'icon' => (string) $icon,
                    'sort' => $navigation_sort,
                ];
            }
            return $out;
        });

        return $regen;
    }
}
