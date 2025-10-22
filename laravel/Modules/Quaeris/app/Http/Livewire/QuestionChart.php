<?php

declare(strict_types=1);

namespace Modules\Quaeris\Http\Livewire;

use Filament\Widgets\ChartWidget;
use Modules\Chart\Datas\AnswersChartData;

/**
 * ---.
 */
class QuestionChart extends /* Component */ ChartWidget
{
    /**
     * @var array<mixed>
     */
    public array $chartData = [
        'datasets' => [
            [
                'label' => 'loading...',
                'data' => [],
            ],
        ],
        'labels' => [],
    ];

    public string $chartType = 'bar';
    /**
     * @var array<mixed>
     */
    public array $chartOptions = [];

    public string $k = '';

    public string $questionChartId = '';
    // protected static ?string $pollingInterval = '20s';
    protected ?string $pollingInterval = null;

    protected int|string|array $columnSpan = '3';

    /** @var array<string, string> */
    protected $listeners = [
        'updateChart' => 'updateChart',
        // 'chartsUpdated'=>'chartsUpdated',
        'refresh' => '$refresh',
    ];

    /**
     * @param string $args
     */
    public function mount(...$args): void
    {
        [$answersData,$k,$questionChartId] = $args;
        $kk = $k;
        $this->k = (string) $kk;

        $qci = $questionChartId;

        $this->questionChartId = $qci;
        // static::$pollingInterval = null;
        /**
         * @var AnswersChartData
         */
        $ad = $answersData;

        $this->setAnswersChartData($ad);
        parent::mount();

        $this->updateChartData();
    }

    public function setAnswersChartData(AnswersChartData $answersChartData): void
    {
        $this->chartData = $answersChartData->getChartJsData();
        $this->chartType = $answersChartData->getChartJsType();
        $this->chartOptions = $answersChartData->getChartJsOptions();
    }

    public function getHeading(): string
    {
        return ''; // 'questionChartId['.$this->questionChartId.']';
        // return 'rand: '.rand(1,1000);
    }

    protected function getType(): string
    {
        return $this->chartType;
    }

    protected function getData(): array
    {
        $activeFilter = $this->filter;
        if ($activeFilter !== null) {
            dddx($activeFilter);
        }

        return $this->chartData;
    }

    /**
     * @return array<mixed>
     */
    protected function getOptions(): array
    {
        return $this->chartOptions;
    }

    // public function updateChart()
    // {

    // per refreshare la pagina
    // return redirect(request()->header('Referer'));

    // dddx([
    //     $charts,
    //     $this->chartData,
    // ]);
    // dddx(get_class_methods($this));
    // $this->updateChartData();
    // $this->updateChart();
    // $this->reset();
    // $this->refresh();
    // dddx($this->chartData);
    // $this->mount();
    // }

    // public function chartsUpdated(string $questionChartId, $charts): void
    // {
    //     /*
    //     dddx([
    //         'questionChartId'=>$questionChartId,
    //         'charts'=>$charts,
    //         'k'=>$this->k,
    //     ]);
    //     */
    //     if($this->questionChartId == $questionChartId) {

    //         $answersData=AnswersChartData::from($charts[$this->k]);

    //         $this->setAnswersChartData($answersData);

    //         $this->cachedData=[];
    //         $this->dataChecksum='aa';

    //         // $this->emit('refresh');
    //         $this->updateChartData();
    //     }

    // }
}
