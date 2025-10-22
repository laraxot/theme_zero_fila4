<?php

declare(strict_types=1);

namespace Modules\Quaeris\Filament\Resources\SurveyPdfResource\Pages;

use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Exception;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
// use Konnco\FilamentImport\Actions\ImportAction;
// use Konnco\FilamentImport\Actions\ImportField;
use Modules\Limesurvey\Models\LimeSurvey;
use Modules\Quaeris\Filament\Resources\SurveyPdfResource;
use Modules\Quaeris\Models\SurveyPdf;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Webmozart\Assert\Assert;

class EditSurveyPdf extends XotBaseEditRecord
{
    protected static string $resource = SurveyPdfResource::class;

    public function hasCombinedRelationManagerTabsWithForm(): bool
    {
        return true;
    }

    /*
    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            // ...
            Pages\EditCustomerContact::class,
        ]);
    }
    */

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

    public function containsOnlyNull(array $array): bool
    {
        foreach ($array as $value) {
            if ($value !== null) {
                return false;
            }
        }

        return true;
    }

    protected function getHeaderActions(): array
    {
        Assert::isInstanceOf($surveyPdf = $this->record, SurveyPdf::class);
        $survey = LimeSurvey::find($surveyPdf->survey_id);
        if ($survey === null) {
            throw new Exception('limesurvey/survey is null');
        }

        $trans = $survey->getTrans();

        return [
            DeleteAction::make(),

            // ImportAction::make()
            //     ->handleBlankRows(true)
            //     ->fields([
            //         ImportField::make('first_name'),
            //         ImportField::make('last_name'),
            //         // ->label('last_name'),
            //         ImportField::make('email')
            //             // ->rules('email|required_if:mobile_phone,'),
            //             ->rules('email'),
            //         ImportField::make('mobile_phone')
            //             ->label('mobile_phone/attribute_3')
            //             // ->rules('regex:/^([0-9\s\-\+\(\)]*)$/|min:10|required_if:email,'),
            //             ->rules('regex:/^([0-9\s\-\+\(\)]*)$/|min:9'),
            //         Select::make('language')
            //             ->required()
            //             ->options([
            //                 'it' => 'it',
            //                 'fr' => 'fr',
            //                 'en' => 'en',
            //             ]),
            //         ImportField::make('attribute_1')
            //             ->label($trans['attribute_1'] ?? 'attribute_1'),
            //         ImportField::make('attribute_2')
            //             ->label($trans['attribute_2'] ?? 'attribute_2'),
            //         // ImportField::make('attribute_3')
            //         //     ->label($trans['attribute_3']),
            //         ImportField::make('attribute_4')
            //             ->label($trans['attribute_4'] ?? 'attribute_4'),
            //         ImportField::make('attribute_5')
            //             ->label($trans['attribute_5'] ?? 'attribute_5'),
            //         ImportField::make('attribute_6')
            //             ->label($trans['attribute_6'] ?? 'attribute_6'),
            //         ImportField::make('attribute_7')
            //             ->label($trans['attribute_7'] ?? 'attribute_7'),
            //         ImportField::make('attribute_8')
            //             ->label($trans['attribute_8'] ?? 'attribute_8'),
            //         ImportField::make('attribute_9')
            //             ->label($trans['attribute_9'] ?? 'attribute_9'),
            //         ImportField::make('attribute_10')
            //             ->label($trans['attribute_10'] ?? 'attribute_10'),
            //         ImportField::make('attribute_11')
            //             ->label($trans['attribute_11'] ?? 'attribute_11'),
            //         ImportField::make('attribute_12')
            //             ->label($trans['attribute_12'] ?? 'attribute_12'),
            //         ImportField::make('attribute_13')
            //             ->label($trans['attribute_13'] ?? 'attribute_13'),
            //         ImportField::make('attribute_14')
            //             ->label($trans['attribute_14'] ?? 'attribute_14'),
            //     ])
            //     ->handleRecordCreation(function (array $data) {
            //         for ($i = 1; $i <= 14; $i++) {
            //             if ($i === 3) {
            //                 continue;
            //             }

            //             $k = 'attribute_'.$i;
            //             if (isset($data[$k])) {
            //                 $data[$k] = $this->fixFormat($data[$k]);
            //             }
            //         }
            //         Assert::isInstanceOf($surveyPdf = $this->record, SurveyPdf::class);
            //         $data['survey_pdf_id'] = $surveyPdf->id;
            //         $data['usesleft'] = '1';

            //         return Contact::create($data);
            //     }),
        ];
    }
}
