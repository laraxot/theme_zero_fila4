<?php
declare(strict_types=1);
namespace Modules\Quaeris\Filament\Resources;

use Filament\Forms\Form;
use Filament\Resources\Resource;
use Modules\Quaeris\Models\Contact;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Quaeris\Filament\Resources\ContactResource\Pages\EditContact;
use Modules\Quaeris\Filament\Resources\ContactResource\Pages\ListContacts;
use Modules\Quaeris\Filament\Resources\ContactResource\Pages\CreateContact;

class ContactResource extends XotBaseResource
{
    public static array $route_params = [];

    protected static ?string $model = Contact::class;

    protected static bool $shouldRegisterNavigation = false;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-user-circle';

    public static function getFormSchema(): array
    {
        return [
                TextInput::make('first_name'),
                TextInput::make('last_name'),
                TextInput::make('email')->email(),
                TextInput::make('mobile_phone')
                    ->tel()
                    ->telRegex('/^[+]*[(]{0,1}\d{1,4}[)]{0,1}[-\s\.\/0-9]*$/'),
                TextInput::make('attribute_1'),
                TextInput::make('attribute_2'),
                TextInput::make('attribute_3'),
                TextInput::make('attribute_4'),
                TextInput::make('attribute_5'),
                TextInput::make('attribute_6'),
                TextInput::make('attribute_7'),
                TextInput::make('attribute_8'),
                TextInput::make('attribute_9'),
                TextInput::make('attribute_10'),
                TextInput::make('attribute_11'),
                TextInput::make('attribute_12'),
                TextInput::make('attribute_13'),
                TextInput::make('attribute_14'),
                TextInput::make('token'),
                DatePicker::make('mail_sent_at')
                    ->displayFormat('d/m/Y'),
                TextInput::make('mail_count'),
                DatePicker::make('sms_sent_at')
                    ->displayFormat('d/m/Y'),
                TextInput::make('sms_count'),
            ];
    }

    // public static function getParent(): string
    // {
    //     return SurveyPdfResource::class;
    // }

    public static function getRelations(): array
    {
        return [

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListContacts::route('/'),
            'create' => CreateContact::route('/create'),
            'edit' => EditContact::route('/{record}/edit'),
            // 'preview-email' => Pages\PreviewEmail::route('/{record}/preview-email'),
        ];
    }
}
