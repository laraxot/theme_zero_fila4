<?php

declare(strict_types=1);

namespace Modules\Setting\Filament\Actions\Table;

use Filament\Actions\Action;
use Illuminate\Support\Facades\Gate;
use Modules\Xot\Filament\Traits\NavigationActionLabelTrait;

class DatabaseBackupTableAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->translateLabel()

            ->tooltip(trans('setting::database_connection.actions.database-backup.tooltip'))
            ->icon(trans('setting::database_connection.actions.database-backup.icon'))
            // ->hidden(fn ($record) => Gate::denies('changePriority', $record))
            // ->steps([
            // ])
            ->action(
                function ($record): void {
                    dddx([
                        'record' => $record,
                        // 'data' => $data,
                    ]);
                }
            );
    }
    // use NavigationActionLabelTrait;

    public static function getDefaultName(): ?string
    {
        return 'database-backup';
    }
}
