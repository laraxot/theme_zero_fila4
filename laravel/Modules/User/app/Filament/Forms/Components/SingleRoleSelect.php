<?php

declare(strict_types=1);

namespace Modules\User\Filament\Forms\Components;

use Filament\Forms\Components\Select;
use Modules\User\Models\Role;

class SingleRoleSelect extends Select
{
    protected string $optionValueProperty = 'id';

    // /*
    protected function setUp(): void
    {
        parent::setUp();
        $options = Role::all()->pluck('name', 'id')->toArray();

        $this->options(fn(): array => $options) // Ruoli dal DB
            // ->searchable() // Permette la ricerca
            // ->preload() // Precarica i risultati
            ->placeholder('Select a role');
    }

    // */

    public function getOptionValueProperty(): string
    {
        return $this->optionValueProperty;
    }

    /*
     * public static function make(string $name): static
     * {
     * return parent::make($name)
     * ->options(Role::all()->pluck('name', 'id')->toArray()) // Ruoli dal DB
     * ->searchable() // Permette la ricerca
     * ->preload() // Precarica i risultati
     * ->placeholder('Select a role');
     * }
     */
}
