<?php
declare(strict_types=1);
/**
 * @see https://filamentphp.com/community/alexandersix-handling-bulk-imports-in-filament
 */

namespace Modules\Quaeris\Filament\Imports;

use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Illuminate\Support\Str;
use Modules\Quaeris\Models\ContactSimple;
use Modules\Quaeris\Models\SurveyPdf;
use Webmozart\Assert\Assert;

class ContactImporter extends Importer
{
    /**
     * @var array<string, mixed>
     */
    public array $options = [];
    protected static ?string $model = ContactSimple::class;

    public static function getColumns(): array
    {
        $survey_pdf_id = Str::of(url()->previous())
            ->between('/survey-pdfs/', '/contacts')
            ->toString();
        $survey = SurveyPdf::firstWhere(['id' => $survey_pdf_id])?->info;

        $trans = $survey?->getTrans() ?? [];

        // dddx($trans);

        $columns = [
            ImportColumn::make('first_name')
                ->ignoreBlankState(),
            ImportColumn::make('last_name')
                ->ignoreBlankState(),
            ImportColumn::make('email')
                //->rules(['email']) //no because if it only has the cell the row is not imported
                // ->rules(['nullable', 'email'])
                ->ignoreBlankState(),
            ImportColumn::make('mobile_phone')
                ->label('mobile_phone/attribute_3')
                //->rules(['regex:/^([0-9\s\-\+\(\)]*)$/|min:9'])
                // ->rules(['nullable', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:9'])
                ->ignoreBlankState(),
        ];
        for ($i = 1;$i <= 14;$i++) {
            if ($i === 3) {
                continue; //il mobile_phone gia' settato
            }
            $k = 'attribute_'.$i;
            $columns[] = ImportColumn::make($k)
                ->label($trans[$k] ?? $k)
                ->ignoreBlankState();
        }

        return $columns;
    }

    public function resolveRecord(): ?ContactSimple
    {
        // :74    Cannot cast mixed to string.
        // $this->options['survey_pdf_id'] arriva come integer ma deve essere una stringa
        $survey_pdf_id = $this->options['survey_pdf_id'];
        if (is_numeric($survey_pdf_id)) {
            $survey_pdf_id = (string) $survey_pdf_id;
        }
        Assert::string($survey_pdf_id, '['.__LINE__.']['.__FILE__.']');

        $contact = new ContactSimple();
        $contact->survey_pdf_id = $survey_pdf_id;
        $contact->usesleft = '1';

        return $contact;
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your contact import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }

    // public static function getOptionsFormComponents(): array
    // {
    //     Assert::notNull($user = Filament::auth()->user(), '['.__FILE__.']['.__LINE__.']');
    //     $currentTeam = $user->currentTeam;
    //     Assert::notNull($currentTeam, '['.__FILE__.']['.__LINE__.']');
    //     Assert::isInstanceOf($currentTeam, Customer::class);
    //     $opts = $currentTeam->surveyPdfs->pluck('name', 'survey_id');

    //     return [
    //         Select::make('surveyPdfId')
    //             ->required()
    //             ->options($opts),
    //     ];
    // }
}
