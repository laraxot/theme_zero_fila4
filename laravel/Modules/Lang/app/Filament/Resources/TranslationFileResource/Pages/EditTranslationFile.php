<?php

declare(strict_types=1);


namespace Modules\Lang\Filament\Resources\TranslationFileResource\Pages;

use Override;
use Filament\Schemas\Components\Section;
use Filament\Actions;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Modules\Lang\Actions\SaveTransAction;
use Modules\Lang\Filament\Actions\LocaleSwitcherRefresh;
use Modules\Lang\Filament\Resources\TranslationFileResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;

class EditTranslationFile extends XotBaseEditRecord
{
    protected static string $resource = TranslationFileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcherRefresh::make('lang'),
            ...parent::getHeaderActions(),
            // ...
        ];
    }

    /**
     * @return array<string>
     */
    public function getTranslatableLocales()
    {
        return ['it', 'en'];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        /*
         * // Salva le traduzioni nel file
         * try {
         * $this->record->saveTranslations($data['content']);
         *
         * Notification::make()
         * ->title('Traduzioni salvate con successo')
         * ->success()
         * ->send();
         *
         * } catch (\Exception $e) {
         * Notification::make()
         * ->title('Errore durante il salvataggio')
         * ->body($e->getMessage())
         * ->danger()
         * ->send();
         *
         * // Previeni il salvataggio se c'è un errore
         * $this->halt();
         * }
         */
        /** @phpstan-ignore argument.type, property.nonObject */
        app(SaveTransAction::class)->execute($this->record->key, $data['content']);
        //dddx(['record'=>$this->record,'data'=>$data]);
        return $data;
    }

    protected function afterSave(): void
    {
        // Ricarica il record per aggiornare i dati
        /** @phpstan-ignore method.nonObject */
        $this->record->refresh();
    }

    #[Override]
    public function getFormSchema(): array
    {
        return [
            Section::make('content')->schema(fn($record) => $this->makeFromArray($record->content, 'content')),
        ];
    }

    public function makeFromArray(array $array, string $prefix = ''): array
    {
        $fields = [];

        foreach ($array as $key => $value) {
            $fullKey = $prefix === '' ? $key : ($prefix . '.' . $key);

            if (is_array($value)) {
                $fields[] = Section::make($key)
                    ->label($fullKey)
                    ->schema(self::makeFromArray($value, $fullKey))
                    ->columns(2);
            } else {
                $fields[] = TextInput::make($fullKey)
                    //->label($fullKey)
                    ->label($key)
                    ->default($value);
            }
        }

        return $fields;
    }
}
