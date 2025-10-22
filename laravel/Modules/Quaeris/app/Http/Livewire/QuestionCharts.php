<?php

declare(strict_types=1);

namespace Modules\Quaeris\Http\Livewire;

use Carbon\Carbon;
use Exception;
use Filament\Widgets\Widget;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;
use Modules\Chart\Datas\AnswersChartData;
use Modules\Quaeris\Actions\QuestionChart\GetChartsDataByQuestionChart;
use Modules\Quaeris\Datas\AnswersFilterData;
use Modules\Quaeris\Models\QuestionChart;

/**
 * ---.
 */
class QuestionCharts extends /*Component*/ Widget
{
    public string $questionChartId;

    /**
     * @var array<AnswersChartData>
     */
    public array $charts = [];

    public ?string $title = '';

    // public string $div_class;
    public ?Carbon $dateFrom = null;

    public ?Carbon $dateTo = null;

    public QuestionChart $questionChart;

    // protected $listeners = [
    //      'dateFromUpdated' => 'dateFromUpdated',
    //      'dateToUpdated' => 'dateToUpdated',
    //      'refresh'=>'$refresh',
    // ];

    /**
     * @return void
     */
    public function mount(string $questionChartId)
    {
        $this->questionChartId = $questionChartId;
        // $res=QuestionChart::find($questionChartId);
        // if($res==null){
        //     throw new \Exception('id ['.$questionChartId.'] not found on QuestionChart');
        // }
        // $this->questionChart=$res;
        $this->questionChart = QuestionChart::findOrFail($questionChartId);

        /**
         * @var Carbon|null
         */
        $date_from = Session::get('date_from') ?? null;
        /**
         * @var Carbon|null
         */
        $date_to = Session::get('date_to') ?? null;
        /**
         * @var string|null
         */
        $questionFilter = Session::get('question_filter');
        $filter = AnswersFilterData::from([
            'date_from' => $date_from,
            'date_to' => $date_to,
            'question_filter' => $questionFilter,
        ]);
        // dddx([$date_from, $date_to, $questionFilter, $filter]);
        if (Session::get('question_filter') !== null) {
            $this->charts = app(GetChartsDataByQuestionChart::class)
                // ->execute($this->questionChart, false, $date_from, $date_to, $questionFilter);
                ->execute($this->questionChart, $filter);
        } else {
            $this->charts = app(GetChartsDataByQuestionChart::class)
                ->execute($this->questionChart);
        }

        // $this->charts = app(\Modules\Quaeris\Actions\QuestionChart\GetChartsDataByQuestionChart::class)
        //    ->execute($this->questionChart);

        // dddx($this->questionChart->full_question_txt);
        if ($this->questionChart->full_question_txt === null) {
            throw new Exception('full_question_txt is null');
        }

        $this->title = $this->questionChart->full_question_txt;
        // $this->div_class = 'grid grid-cols-'.count($this->charts).' gap-3';
    }

    // public function getCharts():array{
    //     return app(\Modules\Quaeris\Actions\QuestionChart\GetChartsDataByQuestionChart::class)
    //         ->execute($this->questionChart,true,$this->dateFrom,$this->dateTo);
    // }

    /**
     * Undocumented function.
     */
    public function render(): View
    {
        /**
         * @phpstan-var view-string
         */
        $view = 'quaeris::livewire.question-charts';

        $view_params = [
            // 'charts' => $this->getCharts(),
            'view' => $view,
        ];

        return view($view, $view_params);
    }

    // public function dateFromUpdated(?string $dateFrom){
    //     if($dateFrom==null){
    //         $this->dateFrom=null;
    //     }else{
    //         $this->dateFrom = Carbon::parse($dateFrom);
    //     }
    //     // $this->emit('refresh');
    //     //$this->emit('updateChart');
    // //     return redirect(request()->header('Referer'));
    // }

    // public function dateToUpdated(?string $dateTo){
    //     if($dateTo==null){
    //         $this->dateTo=null;
    //     }else{
    //         $this->dateTo = Carbon::parse($dateTo);
    //         $this->questionChart->date_to = Carbon::parse($dateTo);
    //     }
    //     // dddx($this->questionChart->date_to);
    //     // dddx($this->dateTo);
    //     // $charts=$this->getCharts();
    //     $charts=app(\Modules\Quaeris\Actions\QuestionChart\GetChartsDataByQuestionChart::class)
    //         ->execute($this->questionChart,true,$this->dateFrom,$this->dateTo);
    //     // dddx([
    //     //     $charts,
    //     //     app(\Modules\Quaeris\Actions\QuestionChart\GetChartsDataByQuestionChart::class)
    //     //     ->execute($this->questionChart,true,$this->dateFrom,$this->dateTo)
    //     // ]);
    //     $this->emit('chartsUpdated',$this->questionChartId,$charts);
    //     $this->emit('refresh');
    //     //$this->emit('updateChart');
    // //     return redirect(request()->header('Referer'));
    // }
}
