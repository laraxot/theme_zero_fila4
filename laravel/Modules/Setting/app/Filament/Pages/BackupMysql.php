<?php

declare(strict_types=1);

namespace Modules\Setting\Filament\Pages;

use Filament\Pages\Page;
use Modules\Setting\Actions\DB\DownloadAction;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Webmozart\Assert\Assert;

class BackupMysql extends Page
{
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-cog';

    protected static string | \UnitEnum | null $navigationGroup = 'Settings';

    protected string $view = 'setting::filament.pages.backup-mysql';

    public function download(string $connectionName): BinaryFileResponse
    {
        return app(DownloadAction::class)->execute($connectionName);
    }

    // public function mount(): void {
    //     $user = auth()->user();
    //     if(!$user->hasRole('super-admin')){
    //         redirect('/admin');
    //     }
    // }

    protected function getViewData(): array
    {
        Assert::isArray($connections = config('database.connections'));

        $connections = array_filter($connections, fn ($item): bool => 'mysql' === $item['driver']);

        // $connections=collect($connections)->keyBy('database');
        return ['connections' => $connections];
    }
}
