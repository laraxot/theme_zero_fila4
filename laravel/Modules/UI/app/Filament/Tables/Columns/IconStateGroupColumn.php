<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Tables\Columns;

use Filament\Schemas\Components\Utilities\Set;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Tables\Columns\ColumnGroup;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Modules\Xot\Contracts\StateContract;
use Webmozart\Assert\Assert;

class IconStateGroupColumn extends ColumnGroup
{
    public string $stateClass = '';
    public string $modelClass = '';
    public array $data = [];

    protected function setUp(): void
    {
        //$this->label('');
    }

    public function stateClass(string $stateClass, string $modelClass): static
    {
        $this->stateClass = $stateClass;
        $this->modelClass = $modelClass;
        $states = $this->stateClass::getStateMapping()->toArray();
        $columns = [];

        foreach ($states as $state => $stateClass) {
            $stateInstance = new $stateClass($this->modelClass);
            Assert::isInstanceOf($stateInstance, StateContract::class);
            $this->data[$state . '-visible'] = true;

            $column = IconColumn::make($state . '-icon')
                ->icon($stateInstance->icon(...))
                ->color($stateInstance->color(...))
                ->tooltip($stateInstance->label(...))
                ->extraAttributes([
                    'class' => 'w-auto min-w-0 px-0',
                    'style' => 'width: fit-content !important;',
                ])
                ->extraCellAttributes(['class' => 'px-1 py-1'])
                ->label('')
                ->default(function ($record, Set $_set) use ($stateClass, $state) {
                    $res = $record->state->canTransitionTo($stateClass);
                    $this->data[$state . '-visible'] = $res;
                    if (!$res) {
                        return null;
                    }
                    return true;
                });
            $column->action(Action::make($state . '-action')
                ->requiresConfirmation()
                ->modalHeading(fn($_record) => $stateInstance->modalHeading())
                ->modalDescription(fn($_record) => $stateInstance->modalDescription())
                ->schema(fn($_record) => $stateInstance->modalFormSchema())
                ->fillForm($stateInstance->modalFillFormByRecord(...))
                ->action(function ($record, $data) use ($stateInstance) {
                    $stateInstance->modalActionByRecord($record, $data);

                    //$this->invalidateCache();
                    //$this->loadAppointments();
                    //$this->dispatch('notify', [
                    //    'type' => 'success',
                    //    'message' => __('ui::messages.action_completed'),
                    //]);
                }));
            $column->visible($this->data[$state . '-visible']);
            $columns[] = $column;
        }

        $this->columns($columns);
        return $this;
    }
}
