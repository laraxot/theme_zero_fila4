<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions\QuestionChart;

use Modules\Chart\Models\Chart;
use Throwable;
use Exception;
use Illuminate\Support\Str;
use Webmozart\Assert\Assert;
use Modules\Chart\Datas\ChartData;
use Illuminate\Support\Facades\File;
use Modules\Media\Actions\Image\Merge;
use Modules\Media\Actions\Image\Merge2;
use Illuminate\Database\Eloquent\Builder;
use Modules\Chart\Datas\AnswersChartData;
use Modules\Quaeris\Models\QuestionChart;
use Spatie\QueueableAction\QueueableAction;
use Illuminate\Database\Eloquent\Collection;
use Modules\Quaeris\Datas\AnswersFilterData;
use Modules\Quaeris\Actions\QuestionChart\Graph\GetTitleAction;
use Modules\Quaeris\Actions\QuestionChart\Graph\GetFooterAction;
use Modules\Quaeris\Actions\QuestionChart\Graph\GetSubtitleAction;

use function Safe\ini_set;

class MakeImgByQuestionChartModel2Action
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(QuestionChart $questionChart, Builder $responses, ?AnswersFilterData $answersFilterData = null): array
    {
        ini_set('memory_limit', '-1');
        ini_set('max_execution_time', '-1');
        $q = $questionChart;
        // $datas = app(\Modules\Quaeris\Actions\QuestionChart\GetChartsDataByQuestionChart::class)
        //     ->execute($q);

        if ($answersFilterData !== null) {
            $datas = app(GetChartsDataByQuestionChart::class)
                ->execute($q, $responses, $answersFilterData);
        } else {
            $datas = app(GetChartsDataByQuestionChart::class)
                ->execute($q, $responses);
        }
        // dddx($datas);
        $filenames = [];
        // dddx($datas[0]);
        if ($datas[0]->answers->count() > 0) {
            foreach ($datas as $k => $data_answers) {
                $da = $data_answers;
                $answers = $da->answers;
                // Assert::isArray($chart_style = $q->charts[$k]);
                Assert::isInstanceOf($chart_style = $q->charts[$k], Chart::class);
                $chart_style['plot_value_show'] = $q->charts[$k]['chart']['plot_value_show'] ?? $q->charts[$k]['plot_value_show'];
                $chart_style['plot_value_pos'] = $q->charts[$k]['chart']['plot_value_pos'] ?? $q->charts[$k]['plot_value_pos'];
                $chart_style['yaxis_hide'] = $q->charts[$k]['chart']['yaxis_hide'] ?? $q->charts[$k]['yaxis_hide'];

                if ($k === 0) {
                    if ($answersFilterData !== null) {
                        $chart_style['title'] = app(GetTitleAction::class)->execute($q, $answersFilterData);
                        $chart_style['subtitle'] = app(GetSubtitleAction::class)->execute($q, $answersFilterData);
                        $chart_style['footer'] = app(GetFooterAction::class)->execute($q, $answersFilterData);
                    } else {
                        $chart_style['title'] = app(GetTitleAction::class)->execute($q);
                        $chart_style['subtitle'] = app(GetSubtitleAction::class)->execute($q);
                        $chart_style['footer'] = app(GetFooterAction::class)->execute($q);
                    }
                }

                if (! isset($chart_style['type'])) {
                    throw new Exception('add mixed_chart and question_chart to config morp_class');
                }
                Assert::string($chart_style['type']);
                if (Str::startsWith($chart_style['type'], 'bar')) {
                    foreach ($answers as $answer) {
                        if (is_array($answer->value)) {
                            foreach ($answer->value as $value) {
                                if ($value > $chart_style['max']) {
                                    // dddx([$chart_style['type'], $chart_style['max'] , $answer->value, $value]);
                                    $chart_style['max'] = $value + 50;
                                }
                            }
                        }
                    }
                }

                $chart_style = ChartData::from($chart_style);
                $action_class = $chart_style->getActionClass();
                if (!class_exists($action_class)) {
                    logger()->error('⚠️ Classe azione grafico non trovata', ['class' => $action_class]);
                }
                $answersData = AnswersChartData::from([
                    'answers' => $answers,
                    'chart' => ChartData::from($chart_style),
                ]);

                $graph = app($action_class)->execute($answersData);
                // $graph = app($action_class)->execute($answers, $chart_style);

                $filename = 'chart/'.$q->id.'-'.$k.'.png';
                $file_path = public_path($filename);
                if (File::exists($file_path)) {
                    File::delete($file_path);
                }

                // logger()->debug('👉 Provo a generare immagine', ['file_path' => $file_path]);

                try {
                    $graph->Stroke($file_path);
                } catch (Throwable $e) {
                    logger()->error('❌ Errore durante Stroke()', [
                        'exception' => $e->getMessage(),
                        'file_path' => $file_path,
                    ]);
                }

                if (!File::exists($file_path)) {
                    logger()->error('❌ Immagine NON generata', [
                        'file_path' => $file_path,
                        'chart_type' => $chart_style['type'] ?? 'N/A',
                        'answers_count' => $answers->count(),
                    ]);
                }

                $filenames[] = $filename;
            }
        } else {
            if (! File::exists('chart/NoDataImage.jpeg')) {
                $pathFrom = module_path('Chart', 'resources/img/NoDataImage.jpeg');
                $pathTo = 'chart/NoDataImage.jpeg';
                File::copy($pathFrom, $pathTo);
            }
            $filenames[] = 'chart/NoDataImage.jpeg';
        }

        $fileName = 'chart/'.$q->id.'.png';
        app(Merge::class)->execute($filenames, $fileName);
        $q->img_src = $fileName;
        $q->generated_at = now();
        $q->save();
        return [
            'q' => $q,
            'question_type' => $q->question_type,
            'field_name' => $q->field_name,
            // 'tot' => app(\Modules\Quaeris\Actions\QuestionChart\GetTot::class)->execute($q), //  dobbiamo risparmiare query !
            // 'risp' => app(\Modules\Quaeris\Actions\QuestionChart\GetAnswersCount::class)->execute($q), //dobbiamo risparmiare query !
            // 'not_risp' => app(\Modules\Quaeris\Actions\QuestionChart\GetNotAnswersCount::class)->execute($q),// dobbiamo risparmiare query !
            'data' => $datas,
            // 'option' => $this->getOption($datas[0]),
            'option' => [],
            'filenames' => $fileName,
        ];
    }
}
