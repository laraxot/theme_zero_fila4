<?php

declare(strict_types=1);

namespace Modules\Quaeris\Tables\Columns;

use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Modules\Chart\Tables\Columns\ChartColumn;
use Modules\Quaeris\Actions\QuestionChart\GetChartsDataByQuestionChart;
use Modules\Quaeris\Datas\AnswersFilterData;
use Modules\Quaeris\Models\QuestionChart;
use Webmozart\Assert\Assert;

class ChartsColumn extends Column
{
    protected string $view = 'quaeris::tables.columns.charts-column';

    /** @var array<string, string> */
    protected $listeners = ['updateFilter' => 'updateFilter'];

    /*
    public $tableFilters;
    public $filters;

    protected $queryString = [
        'isTableReordering' => ['except' => false],
        'tableFilters' => ['as' => 'filters'], // `tableFilters` is now replaced with `filters` in the query string
        'tableSortColumn' => ['except' => ''],
        'tableSortDirection' => ['except' => ''],
        'tableSearchQuery' => ['except' => '', 'as' => 'search'], // `tableSearchQuery` is now replaced with `search` in the query string
    ];


    protected $queryString = [
        'isTableReordering' => ['except' => false],
        'tableFilters',
        'tableSortColumn' => ['except' => ''],
        'tableSortDirection' => ['except' => ''],
        'tableSearchQuery' => ['except' => ''],
    ];
    */
    /**
     * @return array<int<0, max>, ChartColumn>|array{Split}
     */
    public function getComponents(): array
    {
        $answersFilterData = AnswersFilterData::from(session('tableFilters') ?? []);

        Assert::isInstanceOf($this->record, QuestionChart::class, '[wip]');

        $res = [];
        $rows = app(GetChartsDataByQuestionChart::class)
            ->execute($this->record, $answersFilterData);

        // /**
        //  * @var \Modules\Chart\Datas\AnswersChartData
        //  */
        $row_0 = $rows[0];

        if ((is_countable($rows) ? \count($rows) : 0) === 3) {
            // /**
            //  * @var \Modules\Chart\Datas\AnswersChartData
            //  */
            $row_1 = $rows[1];
            // /**
            //  * @var \Modules\Chart\Datas\AnswersChartData
            //  */
            $row_2 = $rows[2];

            return [
                Split::make([
                    ChartColumn::make('id')->setAnswersChartData($row_0),
                    Stack::make([
                        ChartColumn::make('id')->setAnswersChartData($row_1),
                        ChartColumn::make('id')->setAnswersChartData($row_2),
                        // TextColumn::make('question_txt'),
                    ]),
                ]),
            ];
        }

        foreach ($rows as $row) {
            // /**
            //  * @var \Modules\Chart\Datas\AnswersChartData
            //  */
            // $r = $row;
            $res[] = ChartColumn::make('id')->setAnswersChartData($row);
        }

        return $res;
        /*
        if(count($charts)==1){
            return [
                ChartsColumn::make('id'),
            ];
        }
        */
    }

    /**
     * @param array<int<0, max>, ChartColumn>|array{Split} $filter
     */
    public function updateFilter(mixed $filter): void
    {
        dddx($filter);
    }
}
