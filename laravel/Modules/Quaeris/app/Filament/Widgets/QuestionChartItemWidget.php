<?php

declare(strict_types=1);

namespace Modules\Quaeris\Filament\Widgets;

use Filament\Support\RawJs;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Illuminate\Support\Arr;
use Livewire\Attributes\On;
use Modules\Chart\Datas\ChartData;
use Modules\Chart\Models\Chart;
use Modules\Quaeris\Actions\QuestionChart\GetAnswersByQuestionChart;
use Modules\Quaeris\Datas\AnswersFilterData;
use Modules\Quaeris\Models\QuestionChart;
use Webmozart\Assert\Assert;

class QuestionChartItemWidget extends ChartWidget
{
    use InteractsWithPageFilters;

    public int $qid = 0;
    // public string $question_chart_id='';
    public string $chart_index = '';

    public string $max_height = '350px';

    public string $type = 'line';
    public array $chart_data = [];
    public array $chart_options_array = [];
    public string $chart_options_js = '';

    public QuestionChart $question_chart;

    public array $filter_data;

    // protected static ?string $heading = 'Blog Posts';
    protected ?string $pollingInterval = null;

    // danger, gray, info, primary, success or warning
    protected string $color = 'info';

    /** @var array<string, string> */
    protected $listeners = [
        'filterUpdate' => 'filterUpdate',
        'refresh' => '$refresh',
    ];

    // protected static ?string $maxHeight = '20px';

    public function mount(): void
    {
        $this->filterUpdate($this->filter_data);
    }

    public function getDescription(): ?string
    {
        return null;
    }

    #[On('filterUpdate')]
    public function filterUpdate(array $filter_data): void
    {
        Assert::isInstanceOf($chart = $this->question_chart->charts[$this->chart_index], Chart::class, '['.__LINE__.']['.__FILE__.']');

        $chart['max'] = $this->question_chart->max;
        $chart['min'] = $this->question_chart->min;
        $date_from = Arr::get($filter_data, 'startDate');
        Assert::string($date_to = Arr::get($filter_data, 'endDate'));
        $date_to .= ' 23:59:59';
        $filter = AnswersFilterData::from([
            'date_from' => $date_from,
            'date_to' => $date_to,
            'question_filter' => Arr::get($filter_data, 'question_filter'),
        ]);

        $group_by = is_string($chart['group_by']) ? $chart['group_by'] : null;
        $sort_by = is_string($chart['sort_by']) ? $chart['sort_by'] : null;

        // $answersData = app(GetAnswersByQuestionChart::class)->execute($this->question_chart, $chart['group_by'], $chart['sort_by'], $filter);
        $answersData = app(GetAnswersByQuestionChart::class)->execute($this->question_chart, $group_by, $sort_by, $filter);

        $answersData->chart = ChartData::from($chart);

        $this->type = $answersData->getChartJsType();
        $this->chart_data = $answersData->getChartJsData();
        $this->chart_options_js = $answersData->getChartJsOptionsJs()->__toString();
    }

    protected function getData(): array
    {
        static::$maxHeight = $this->max_height;

        return $this->chart_data;
    }

    protected function getType(): string
    {
        return $this->type;
    }

    protected function getOptions(): RawJs|array|null
    {
        return RawJs::make($this->chart_options_js);
        // return $this->chart_options_js;
        // return $this->chart_options_array;
    }

    /**
     * Determina quante colonne occupa il widget.
     */
    public function getColumnSpan(): int|string|array
    {
        return [
            'default' => 1,  // Mobile: 1 colonna
            'sm' => 1,       // Small: 1 colonna
            'md' => 1,       // Medium: 1 colonna (metà riga)
            'lg' => 1,       // Large: 1 colonna (metà riga)
            'xl' => 1,       // Extra Large: 1 colonna (metà riga)
            '2xl' => 1,      // 2X Large: 1 colonna (metà riga)
        ];
    }

    /**
     * Alternativa: metodo getColumns() per compatibilità
     */
    public function getColumns(): int
    {
        return 1;  // Ogni widget occupa 1 colonna
    }
}
