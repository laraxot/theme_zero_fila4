<?php

declare(strict_types=1);

namespace Modules\Cms\Filament\Pages;

use BackedEnum;
use Filament\Facades\Filament;
use Filament\Pages\Page;
use Filament\Panel;
use Filament\Support\Facades\FilamentIcon;
use Filament\Widgets\Widget;
use Filament\Widgets\WidgetConfiguration;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Facades\Route;
use Modules\Xot\Filament\Pages\XotBaseDashboard;

class Dashboard extends XotBaseDashboard
{
    
    // protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-home';

    protected static string | \UnitEnum | null $navigationGroup = 'Dashboards';

    protected string $view = 'filament-panels::pages.dashboard';

    public static function getNavigationLabel(): string
    {
        return static::$navigationLabel ?? static::$title ?? __('filament-panels::pages/dashboard.title');
    }

    public static function getNavigationIcon(): null|string
    {
        $icon = static::$navigationIcon ??
            FilamentIcon::resolve('panels::pages.dashboard.navigation-item') ??
                (Filament::hasTopNavigation() ? 'heroicon-m-home' : 'heroicon-o-home');
        
        if ($icon instanceof BackedEnum) {
            return (string) $icon->value;
        }
        
        return is_string($icon) ? $icon : null;
    }

    public static function routes(Panel $panel): void
    {
        Route::get('/', static::class)
            ->middleware(static::getRouteMiddleware($panel))
            ->withoutMiddleware(static::getWithoutRouteMiddleware($panel))
            ->name(static::getSlug());
    }

    public function mount(): void
    {
        // $user = auth()->user();
        // if (1 === $user->roles->count()) {
        //    redirect('/blog/admin/dashboard');
        // }
        // if (! $user->hasRole('super-admin')) {
        //     redirect('/admin');
        // }
    }

    /**
     * @return array<class-string<Widget>|WidgetConfiguration>
     */
    public function getWidgets(): array
    {
        /**
         * @var array<class-string<Widget>|WidgetConfiguration>
         */
        $widgets = Filament::getWidgets();

        return $widgets;
    }

    /**
     * @return array<class-string<Widget>|WidgetConfiguration>
     */
    public function getVisibleWidgets(): array
    {
        return $this->filterVisibleWidgets($this->getWidgets());
    }

    /**
     * @return int|array<string, int|string|null>
     */
    public function getColumns(): int|array
    {
        return 2;
    }

    public function getTitle(): string|Htmlable
    {
        return static::$title ?? __('filament-panels::pages/dashboard.title');
    }
}
