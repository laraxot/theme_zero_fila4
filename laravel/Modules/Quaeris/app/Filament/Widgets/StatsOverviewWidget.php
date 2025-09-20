<?php

declare(strict_types=1);

namespace Modules\Quaeris\Filament\Widgets;

use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Arr;
use Modules\Limesurvey\Models\SurveyResponse;
use Modules\Quaeris\Models\SurveyPdf;
use Webmozart\Assert\Assert;

class StatsOverviewWidget extends BaseWidget
{
    use InteractsWithPageFilters;

    protected static ?int $sort = 0;

    public function getSurvey(): SurveyPdf
    {
        $survey_pdf_id = Arr::get($this->pageFilters ?? [], 'survey_pdf_id', null);
        $survey_pdf = SurveyPdf::with(['questionCharts', 'questionCharts.extra'])
            ->firstWhere(['id' => $survey_pdf_id]);
        Assert::notNull($survey_pdf);
        return $survey_pdf;
    }

    public function getSurveyId(): string
    {
        $survey_pdf = $this->getSurvey();
        Assert::notNull($survey_pdf->survey_id);
        return $survey_pdf->survey_id;
    }

    protected function getStats(): array
    {
        $survey_response = SurveyResponse::getResponsesForSurvey($this->getSurveyId());
        $stats = [];
        $stats[] = Stat::make('prima risposta', $survey_response->min('submitdate'));
        $stats[] = Stat::make('ultima risposta', $survey_response->max('submitdate'));
        $stats[] = Stat::make('totale risposta', $survey_response->count('submitdate'));
        return $stats;

        //->description('32k increase '.$startDate)
        //->descriptionIcon('heroicon-m-arrow-trending-up')
        //->chart([7, 2, 10, 3, 15, 4, 17])
        //->color('success')
        //->icon('heroicon-s-fire')
    }
}
