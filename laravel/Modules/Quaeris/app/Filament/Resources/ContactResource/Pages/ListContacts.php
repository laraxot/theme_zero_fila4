<?php

declare(strict_types=1);

namespace Modules\Quaeris\Filament\Resources\ContactResource\Pages;

use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkAction;
use Filament\Tables\Table;
use Webmozart\Assert\Assert;
use Filament\Actions\CreateAction;
use Filament\Tables\Filters\Filter;
// use Konnco\FilamentImport\Actions\ImportAction;
// use Konnco\FilamentImport\Actions\ImportField;
use Modules\Quaeris\Mail\TestEmail;
use Modules\Quaeris\Models\Contact;
use Filament\Forms\Components\Radio;
use Illuminate\Support\Facades\Mail;
use Modules\UI\Enums\TableLayoutEnum;
use Filament\Tables\Columns\TextColumn;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Database\Eloquent\Collection;
use Modules\Quaeris\Actions\SendInviteAction;
use Modules\Notify\Notifications\RecordNotification;
use Modules\Quaeris\Actions\UpdateContactTokenAction;
use Modules\Quaeris\Filament\Resources\ContactResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Filament\Tables\Actions\CreateAction as TableCreateAction;

class ListContacts extends XotBaseListRecords
{
    public TableLayoutEnum $layoutView = TableLayoutEnum::LIST;
    // //use \SevendaysDigital\FilamentNestedResources\ResourcePages\NestedPage;
    protected static string $resource = ContactResource::class;

    /**
     * @param  int|string  $value
     *
     * @return float|string|int
     */
    public function fixFormat($value)
    {
        if (! is_numeric($value)) {
            return $value;
        }

        $res = Date::excelToDateTimeObject((int) $value);
        if ($res->format('Y') > 2020) {
            return $res->format('d/m/Y H:i:s');
        }

        return $value;
    }

    public function getTableColumns(): array
    {
        return [
            /*
            TextColumn::make('allow_multiple_invite'),
            TextColumn::make('duplicate_count'),
            TextColumn::make('token'),
            */
            TextColumn::make('info_cell')->label('info')->html(),
            //TextColumn::make('first_name'),
            //TextColumn::make('last_name'),
            //TextColumn::make('language'),
            // TextColumn::make('attribute_1'),
            // TextColumn::make('attribute_2'),
            // TextColumn::make('attribute_3'),
            // TextColumn::make('attribute_4'),
            TextColumn::make('email_cell')->label('email')->html(),
            /*
            TextColumn::make('email'),
            TextColumn::make('mail_sent_at'),
            TextColumn::make('mail_count'),
            */
            TextColumn::make('sms_cell')->label('sms')->html(),
            /*
            TextColumn::make('mobile_phone'),
            TextColumn::make('sms_sent_at'),
            TextColumn::make('sms_count'),
            */
            TextColumn::make('token')
                ->searchable(),

        ];
    }

    public function getTableFilters(): array
    {
        return [
            Filter::make('search_contacts')
                ->label('Cerca contatti')
                ->schema([
                    Radio::make('type')
                        ->label('Cerca Contatti')
                        ->options([
                            'none' => 'Tutti',
                            'no_invited' => 'Senza Nessun invio',
                            'no_mail' => 'Solo inviti sms',
                            'no_sms' => 'Solo inviti email',
                            'no_token' => 'Senza token',
                        ])
                        ->default('none'),

                ])
                ->indicateUsing(function (array $data): ?string {
                    if ($data['type'] === 'no_invited') {
                        return 'Senza Invito';
                    }
                    if ($data['type'] === 'no_mail') {
                        return 'Solo inviti sms';
                    }
                    if ($data['type'] === 'no_sms') {
                        return 'Solo inviti email';
                    }
                    if ($data['type'] === 'no_token') {
                        return 'Senza token';
                    }
                    return null;
                })
                ->query(function ($query, array $data): Builder {
                    if ($data['type'] === 'no_invited') {
                        return $query->where('sms_count', null)
                            ->where('mail_count', null);
                    }
                    if ($data['type'] === 'no_mail') {
                        return $query->where('mail_count', null);
                    }
                    if ($data['type'] === 'no_sms') {
                        return $query->where('sms_count', null);
                    }
                    if ($data['type'] === 'no_token') {
                        return $query->where('token', null);
                    }
                    return $query;
                }),
        ];
    }

    public function getTableActions(): array
    {
        return [
            EditAction::make(),
            DeleteAction::make(),
            // Tables\Actions\Action::make('previewEmail')
            //     ->label('Preview Email')
            //     ->icon('heroicon-o-arrow-path')
            //     ->url(fn ($record): string => ContactResource::getUrl('preview-email', ['record' => $record, ...self::$route_params])),
        ];
    }

    public function getTableBulkActions(): array
    {
        return [
            DeleteBulkAction::make(),
            BulkAction::make('make-token')
                ->action(function (Collection $collection): void {
                    $records = $collection->where('token', null);
                    foreach ($collection as $record) {
                        Assert::isInstanceOf($record, Contact::class);
                        app(UpdateContactTokenAction::class)->onQueue()->execute($record);
                    }

                    Notification::make()
                        ->title('Saved successfully')
                        ->success()
                        ->send();
                })
                ->requiresConfirmation()
                ->color('success')
                ->icon('heroicon-o-check')
                ->label('Genera Token'),
            BulkAction::make('send-invite')
                ->action(function (Collection $collection): void {
                    $records = $collection->where('sms_count', null)->where('mail_count', null);
                    // dddx($records);
                    foreach ($records as $record) {
                        Assert::isInstanceOf($contact = $record, Contact::class);
                        app(SendInviteAction::class)->onQueue()->execute($contact);
                        // app(SendInviteAction::class)->execute($record);
                    }

                    Notification::make()
                        ->title('Saved successfully')
                        ->success()
                        ->send();
                })
                ->requiresConfirmation()
                ->color('success')
                ->icon('heroicon-o-check')
                ->label('Invia Inviti'),

            BulkAction::make('send-spatie-email')
                ->label('Invia Spatie Email')
                ->icon('heroicon-o-envelope')
                ->color('primary')
                ->requiresConfirmation()
                ->action(function (Collection $records): void {
                    foreach ($records as $record) {
                        // Verifica istanza corretta
                        Assert::isInstanceOf($record, Contact::class);

                        // Verifica presenza email valida
                        if (! filter_var($record->email, FILTER_VALIDATE_EMAIL)) {
                            continue;
                        }
                        // dddx([
                        //     $record,
                        //     $record->surveyPdf,
                        //     $record->survey_id,
                        //     $record->token,
                        //     $record->language,
                        //     'https://survey.quaerisofficina.it/' . $record->survey_id . '?token=' . $record->token . '&lang=' . $record->language
                        // ]);
                        // Prepara i dati che vuoi passare alla mail (opzionale)
                        $data = [
                            'first_name' => $record->first_name ?? '',
                            'last_name' => $record->last_name ?? '',
                            // Altri dati...
                            'link' => 'https://survey.quaerisofficina.it/' . $record->survey_id . '?token=' . $record->token . '&lang=' . $record->language,
                        ];


                        // Costruisci la notifica
                        $notification = (new RecordNotification($record, slug: $record->surveyPdf->name))
                            ->mergeData($data);

                        // Invia tramite mail a destinatario anonimo
                        \Illuminate\Support\Facades\Notification::route('mail', $record->email)
                            ->notify($notification);
                    }

                    Notification::make()
                        ->success()
                        ->title("Email inviate con successo")
                        ->send();
                }),
        ];
    }
}
