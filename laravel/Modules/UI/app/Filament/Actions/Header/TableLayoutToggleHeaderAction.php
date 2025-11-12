<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Actions\Header;

use Filament\Actions\Action;

/**
 * @see https://filamentphp.com/plugins/tgeorgel-table-layout-toggle
 */
class TableLayoutToggleHeaderAction extends Action
{
    // use NavigationActionLabelTrait;
    public string $list_icon = 'heroicon-o-list-bullet';

    public string $grid_icon = 'heroicon-o-squares-2x2';

    protected function setUp(): void
    {
        parent::setUp();
        $this->translateLabel()
            ->color('secondary')
            // ->label(trans('ui::'.static::getDefaultName().'.label'))
            // ->tooltip(trans('setting::database_connection.actions.database-backup.tooltip'))
            // ->icon(trans('setting::database_connection.actions.database-backup.icon'))
            // ->icon($this->list_icon)
            ->icon(fn($livewire) => 'list' === $livewire->layoutView ? $this->list_icon : $this->grid_icon)
            ->action(function ($livewire) {
                if ($livewire !== null) {
                    $livewire->layoutView = 'grid' === $livewire->layoutView ? 'list' : 'grid';
                }
            });
    }

    public static function getDefaultName(): string
    {
        return 'table_layout_toggle';
    }
}
