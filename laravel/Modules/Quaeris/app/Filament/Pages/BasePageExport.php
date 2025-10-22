<?php
declare(strict_types=1);
namespace Modules\Quaeris\Filament\Pages;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Modules\Quaeris\Filament\Widgets\StatsOverviewWidget;
use Modules\Quaeris\Filament\Widgets\CompleteAnswers;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use Filament\Pages\Dashboard;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Illuminate\Support\Arr;
use Modules\Limesurvey\Models\LimeGroup;
use Modules\Quaeris\Datas\DashboardFilterData;
use Modules\Quaeris\Filament\Widgets;
use Modules\Quaeris\Models\SurveyPdf;
use Webmozart\Assert\Assert;

/**
 * @property array $filters
 */
abstract class BasePageExport extends Dashboard
{
    use HasFiltersForm;
    public DashboardFilterData $filters_data;
    public string $url = '#';
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-document-text';
    protected static string | \UnitEnum | null $navigationGroup = 'Esportazioni';
    protected static ?string $navigationLabel = 'Completa';
    protected static ?string $title = 'Completa';
    protected static string $routePath = 'complete';

    protected static ?int $navigationSort = 200;

    public static function shouldRegisterNavigation(): bool
    {
        return true;
    }

    public function mount(): void
    {
        $this->url = request()->fullUrl();
        if (! is_array($this->filters)) {
            $this->filters = [];
        }
        $filters = DashboardFilterData::fromArray($this->filters);
        //$this->filters = Arr::except($filters->toArray(), ['survey_pdf_opts']);
        $this->filters = array_merge($this->filters, Arr::except($filters->toArray(), ['survey_pdf_opts']));
        $this->filters_data = $filters;
    }

    public function getFiltersExtra(): array
    {
        return [];
    }

    public function filtersForm(Schema $schema): Schema
    {
        $extra = $this->getFiltersExtra();

        return $schema
            ->components([
                Section::make()
                    ->schema(
                        $this->filters_data->getFiltersFormArray(extra:$extra)
                    )
                    ->columns(6),
            ]);
    }

    public function getWidgets(): array
    {
        return [
            StatsOverviewWidget::class,
            CompleteAnswers::class,
        ];
    }

    public function getSurvey(): SurveyPdf
    {
        $survey_pdf_id = Arr::get($this->filters ?? [], 'survey_pdf_id', null);
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

    public function getGroups(): array
    {
        return LimeGroup::where('sid', $this->getSurveyId())
            ->with('labels')
            ->get()
            ->pluck('labels.group_name', 'gid')
            ->all()
        ;
    }

    public function refreshPage(): void
    {
        if ($this->filters === null) {
            return;
        }

        $params = [
            'filters' => $this->filters,
        ];

        $url = self::getUrl($params);
        $url = urldecode((string) $url);
        $this->reloadPage($url);
    }

    /**
     * Undocumented function
     *
     * @return Redirector|RedirectResponse
     */
    public function reloadPage(string $url)
    {
        return redirect($url);
    }
}
