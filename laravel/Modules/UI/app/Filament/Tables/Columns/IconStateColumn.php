<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Tables\Columns;

use Filament\Actions\Action;
use Filament\Schemas\Components\Utilities\Get;
use Exception;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\SelectColumn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Spatie\ModelStates\HasStatesContract;
use Spatie\ModelStates\State;
use Webmozart\Assert\Assert;

class IconStateColumn extends IconColumn
{
    protected function setUp(): void
    {
        parent::setUp();
        //$this->getStateUsing(fn() => true); // the column requires a state to be passed to it
        $this->icon(fn($state): null|string => $state?->icon());
        $this->color(fn($state): null|string => $state?->color());
        $this->tooltip(fn($state): null|string => $state?->label());
        //$this->label('aaa');

        $this->action(
            Action::make('change-state')
                ->schema([
                    Select::make('state')
                        ->options(function (Model&HasStatesContract $record, string $_state): array {
                            $name = $this->getName();
                            $state = $record->getAttribute($name);
                            if ($state === null) {
                                $states = Arr::wrap($record->getDefaultStateFor($name));
                                return array_combine($states, $states);
                            }
                            Assert::isInstanceOf($state, State::class);

                            try {
                                $states = $state->transitionableStates();
                            } catch (Exception $e) {
                                $states = $record->getStatesFor($name)->toArray();


                            }
                            /** @phpstan-ignore-next-line */
                            $states = Arr::mapWithKeys($states, function ($state) use ($record) {
                                $model = Str::of(class_basename($record))->slug()->toString();
                                /** @phpstan-ignore binaryOp.invalid */
                                Assert::string($label = __('pub_theme::' . $model . '_states.' . $state . '.label'));
                                return [$state => $label];
                            });
                            return $states;
                        })
                        ->required()
                        ->reactive(),
                    Textarea::make('message')->required(function (Get $get, $record) {
                        $newState = $get('state');
                        $name = $this->getName();
                        $state = $record->getAttribute($name);
                        $states = $state::getStateMapping();
                        /** @var class-string<State> $newStateClass */
                        $newStateClass = Arr::get($states, (string) $newState);
                        if (!is_string($newStateClass) || !class_exists($newStateClass)) {
                            return false;
                        }
                        $newStateInstance = new $newStateClass($record);
                        return method_exists($newStateInstance, 'isMessageRequired')
                            ? $newStateInstance->isMessageRequired()
                            : false;
                    }),
                ])
                ->fillForm(fn($record) => [
                    'state' => $record->state::$name,
                ])
                ->action(function ($record, $data) {
                    $state = $data['state'];
                    $model = Str::of(class_basename($record))->slug()->toString();
                    Assert::string($label = __('pub_theme::' . $model . '_states.' . $state . '.label'));
                    $record->state->transitionTo($data['state'], $data['message']);
                    Notification::make()
                        ->title('Stato aggiornato a ' . $label)
                        ->success()
                        ->send();
                }),
        );
    }
}
