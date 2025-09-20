<?php

declare(strict_types=1);

namespace Modules\Quaeris\Filament\Resources\QuestionChartResource\Pages;

use Modules\Limesurvey\Models\SurveyResponse;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Resources\Pages\Page;
use Modules\Quaeris\Actions\QuestionChart\MakeImgByQuestionChartModel2Action;
use Modules\Quaeris\Filament\Resources\QuestionChartResource;
use Modules\Quaeris\Models\QuestionChart;
use Webmozart\Assert\Assert;

class RegenImg2 extends Page
{
    use InteractsWithRecord;

    // //use \SevendaysDigital\FilamentNestedResources\ResourcePages\NestedPage;

    public static string $label = 'Custom Navigation Label';

    //public static $slug = 'custom-url-slug';

    public static ?string $title = 'Regenerate Image';

    protected static string $resource = QuestionChartResource::class;

    protected string $view = 'quaeris::filament.resources.question-chart-resource.pages.regen-img-2';

    public function mount(string $record): void
    {
        Assert::notNull($user = auth()->user(), '['.__FILE__.']['.__LINE__.']');
        if (! $user->hasRole('super-admin')) {
            redirect('/admin');
        }
        // $this->record = $this->resolveRecord($record);
        $this->record = QuestionChart::find($record);
    }

    protected function getViewData(): array
    {
        Assert::isInstanceOf($questionChart = $this->record, QuestionChart::class);
        // Costruisci la query delle risposte senza filtri specifici
        $responses = SurveyResponse::getResponsesForSurvey(
            (string) $questionChart->survey_id
        )
        ->where('submitdate', '!=', null);

        return app(MakeImgByQuestionChartModel2Action::class)
            ->execute($questionChart, $responses);
    }
}
