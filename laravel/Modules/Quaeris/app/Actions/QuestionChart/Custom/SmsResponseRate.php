<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions\QuestionChart\Custom;

use Staudenmeir\LaravelCte\Query\Builder;
use Modules\Chart\Datas\AnswerData;
use Modules\Chart\Datas\AnswersChartData;
use Modules\Quaeris\Actions\QuestionChart\Custom\Custom\MergeInvitedAnswers;
use Modules\Quaeris\Actions\QuestionChart\GetPieceQueryBySurveyIdAction;
use Modules\Quaeris\Datas\AnswersFilterData;
use Modules\Quaeris\Models\Contact;
use Modules\Quaeris\Models\QuestionChart;
use Spatie\LaravelData\DataCollection;
use Spatie\QueueableAction\QueueableAction;

class SmsResponseRate
{
    use QueueableAction;

    public int $invited_count = 0;

    public int $answers_count = 0;

    /**
     * Execute the action.
     */
    public function execute(QuestionChart $questionChart, string $group_by, string $sort_by, ?AnswersFilterData $answersFilterData = null): AnswersChartData
    {
        $invited_rows = $this->getSmsInvited($questionChart, $group_by, $sort_by, $answersFilterData);
        $answers_rows = $this->getSmsAnswers($questionChart, $group_by, $sort_by, $answersFilterData);
        $data = $this->mergeInvitedAnswers($invited_rows, $answers_rows);
        $dataCollection = AnswerData::collect($data, DataCollection::class);
        $answersChartData = AnswersChartData::from(['answers' => $dataCollection, 'chart' => $questionChart->charts, 'tot_answered' => $this->answers_count, 'tot_invited' => $this->invited_count]);
        if ($this->invited_count !== 0) {
            $risp_perc = $this->answers_count * 100 / $this->invited_count;
        } else {
            $risp_perc = 100;
            // dddx(round($risp_perc, 2).'%');
        }

        // $res->footer = 'Totale Invitati: '.$this->invited_count.' - Rispondenti: '.$this->answers_count.' - Percentuale di risposta '.round($this->answers_count * 100 / $this->invited_count, 2).'%';
        $answersChartData->footer = 'Totale Invitati: '.$this->invited_count.' - Rispondenti: '.$this->answers_count.' - Percentuale di risposta '.round($risp_perc, 2).'%';

        return $answersChartData;
    }

    /**
     * @param Builder|\Illuminate\Database\Query\Builder $builder
     *
     * @return Builder|\Illuminate\Database\Query\Builder
     */
    public function withContacts($builder, string $survey_id)
    {
        $contacts_table = app(Contact::class);
        $contacts_table_full = $contacts_table->getConnection()->getDatabaseName().'.'.$contacts_table->getTable();
        $survey_table = 'lime_survey_'.$survey_id;

        return $builder
            ->join($contacts_table_full.' as B', static function ($join) use ($survey_table): void {
                $join->on('B.token', '=', $survey_table.'.token')
                    ->where('B.token', '!=', null);
            });
    }

    /**
     * @return DataCollection<AnswerData>
     */
    public function getSmsInvited(QuestionChart $questionChart, string $group_by, string $sort_by, ?AnswersFilterData $answersFilterData = null): DataCollection
    {
        $dateFrom = $questionChart->date_from;
        $dateTo = $questionChart->date_to;
        if ($answersFilterData !== null) {
            $dateFrom = $answersFilterData->date_from;
            $dateTo = $answersFilterData->date_to;
        }

        $invited = Contact::where('survey_pdf_id', $questionChart->survey_pdf_id)
            ->where('sms_count', '!=', 0)
            ->when($dateFrom, static function ($q1) use ($dateFrom): void {
                $q1->where('sms_sent_at', '>=', $dateFrom);
            })->when($dateTo, static function ($q1) use ($dateTo): void {
                $q1->where('sms_sent_at', '<=', $dateTo);
            });
        // ->where('sms_sent_at', '>=', $q->date_from ?? 0)
        // ->where('sms_sent_at', '<=', $q->date_to ?? now());

        if ($answersFilterData?->question_filter !== null) {
            $invited->where('attribute_2', trans('quaeris::contact.attribute.2.'.$answersFilterData->question_filter));
        }

        $this->invited_count = $invited->count();
        $group_by = app(GetPieceQueryBySurveyIdAction::class)
            ->execute($questionChart->survey_id, $group_by, 'name', 'sms_sent_at');
        $sort_by = app(GetPieceQueryBySurveyIdAction::class)
            ->execute($questionChart->survey_id, $sort_by, 'number', 'sms_sent_at');
        $label = $group_by;
        $select = [];
        $select[] = $label.' as label';
        $select[] = $sort_by.' as _sort';
        $select[] = 'count(*) as value';
        $rows = $invited
            ->selectRaw(implode(',', $select))
            ->groupByRaw($group_by)
            ->orderByRaw($sort_by)
            ->get();

        /**
         * @var DataCollection<AnswerData>
         */
        return AnswerData::collect($rows->toArray(), DataCollection::class);
    }

    /**
     * @return DataCollection<AnswerData>
     */
    public function getSmsAnswers(QuestionChart $questionChart, string $group_by, string $sort_by, ?AnswersFilterData $answersFilterData = null): DataCollection
    {
        $dateFrom = $questionChart->date_from;
        $dateTo = $questionChart->date_to;
        if ($answersFilterData !== null) {
            $dateFrom = $answersFilterData->date_from;
            $dateTo = $answersFilterData->date_to;
        }

        $answers = $this->withContacts($questionChart->answers()->getQuery(), $questionChart->survey_id)
            ->where('sms_count', '!=', 0)
            ->when($dateFrom, static function ($q1) use ($dateFrom): void {
                $q1->where('sms_sent_at', '>=', $dateFrom);
            })->when($dateTo, static function ($q1) use ($dateTo): void {
                $q1->where('sms_sent_at', '<=', $dateTo);
            });
        // if ($answersFilterData?->question_filter != null) {
        //     $answers->where('attribute_2', trans('quaeris::contact.attribute.2.' . $answersFilterData?->question_filter));
        // }
        if ($answersFilterData !== null && $answersFilterData->question_filter !== null) {
            $answers->where('attribute_2', trans('quaeris::contact.attribute.2.'.$answersFilterData->question_filter));
        }

        $this->answers_count = $answers->count();
        $group_by = app(GetPieceQueryBySurveyIdAction::class)
            ->execute($questionChart->survey_id, $group_by, 'name', 'sms_sent_at');
        $sort_by = app(GetPieceQueryBySurveyIdAction::class)
            ->execute($questionChart->survey_id, $sort_by, 'number', 'sms_sent_at');
        $label = $group_by;
        $select = [];
        $select[] = $label.' as label';
        $select[] = $sort_by.' as _sort';
        //non si usa ???
        $select[] = 'count(*) as value';
        // $tot_invited = $invited->count();
        // $tot_answers = $answers->count();

        $rows = $answers->selectRaw(implode(',', $select))
            ->groupByRaw($group_by)
            ->orderByRaw($sort_by)
            ->get();

        /**
         * @var DataCollection<AnswerData>
         */
        return AnswerData::collect($rows->toArray(), DataCollection::class);
    }

    /**
     * Undocumented function
     *
     * @param  DataCollection<AnswerData>  $invited_rows
     * @param  DataCollection<AnswerData>  $answers_rows
     *
     * @return DataCollection<AnswerData>
     */
    public function mergeInvitedAnswers(DataCollection $invited_rows, DataCollection $answers_rows): DataCollection
    {
        return app(MergeInvitedAnswers::class)->execute($invited_rows, $answers_rows);
    }
}
