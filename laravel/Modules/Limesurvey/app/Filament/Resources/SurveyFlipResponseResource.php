<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Filament\Resources;

use Modules\Limesurvey\Filament\Resources\SurveyFlipResponseResource\Pages\ListSurveyFlipResponses;
use Modules\Limesurvey\Filament\Resources\SurveyFlipResponseResource\Pages\CreateSurveyFlipResponse;
use Modules\Limesurvey\Filament\Resources\SurveyFlipResponseResource\Pages\EditSurveyFlipResponse;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
// Ensure this is still included for potential future use
use Filament\Forms\Components\DateTimePicker;
use Modules\Limesurvey\Models\SurveyFlipResponse;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Limesurvey\Filament\Resources\SurveyFlipResponseResource\Pages;

class SurveyFlipResponseResource extends XotBaseResource
{
    protected static ?string $model = SurveyFlipResponse::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-rectangle-stack'; // Updated navigation icon
    protected static string | \UnitEnum | null $navigationGroup = 'Limesurvey';
    //protected static ?string $label = 'Survey Flip Response';
    //protected static ?string $pluralLabel = 'Survey Flip Responses';

    //protected static string $slug = 'survey-flip-responses';

    public static function getFormSchema(): array
    {
        return [
                TextInput::make('survey_id')
                    ->required(),
                TextInput::make('token')
                    ->required(),
                TextInput::make('answer')
                    ->required(),
                TextInput::make('value')
                    ->required(),
                DateTimePicker::make('submitdate')
                    ->required(),
                TextInput::make('fieldname')
                    ->required(),
            ];
    }

    public static function getRelations(): array
    {
        return [

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSurveyFlipResponses::route('/'),
            'create' => CreateSurveyFlipResponse::route('/create'),
            'edit' => EditSurveyFlipResponse::route('/{record}/edit'),
        ];
    }
}
