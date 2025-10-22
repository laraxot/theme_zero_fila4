<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Pages;

use Override;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists;
use Modules\User\Filament\Resources\UserResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

/**
 * Base class for viewing user resources.
 *
 * This class provides the base configuration for viewing user resources
 * across the application. It should be extended by specific user type
 * view classes rather than used directly.
 */
abstract class BaseViewUser extends XotBaseViewRecord
{
    protected static string $resource = UserResource::class;

    /**
     * Define the infolist schema for the view.
     *
     * @return array<string, mixed>
     */
    #[Override]
    public function getInfolistSchema(): array
    {
        return [
            'name' => TextEntry::make('name')->label(trans('user::resource.fields.name')),
            'email' => TextEntry::make('email')->label(trans('user::resource.fields.email')),
            'type' => TextEntry::make('type')->label(trans('user::resource.fields.type')),
            'state' => TextEntry::make('state')->label(trans('user::resource.fields.state')),
            'created_at' => TextEntry::make('created_at')
                ->label(trans('user::resource.fields.created_at'))
                ->dateTime(),
            'updated_at' => TextEntry::make('updated_at')
                ->label(trans('user::resource.fields.updated_at'))
                ->dateTime(),
        ];
    }
}
