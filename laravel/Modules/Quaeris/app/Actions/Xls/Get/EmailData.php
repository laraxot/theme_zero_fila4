<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions\Xls\Get;

use Modules\Limesurvey\Models\SurveyResponse;
use Modules\Quaeris\Actions\Question\GetAnswerFieldNameByQuestionCollAction;
use Modules\Quaeris\Actions\Question\GetQuestionBreadsByTitleAction;
use Modules\Quaeris\Datas\AnswersFilterData;
use Modules\Quaeris\Models\SurveyPdf;
use function Safe\ini_set;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class EmailData
{
    use QueueableAction;

    /**
     * Create a new action instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Prepare the action for execution, leveraging constructor injection.
    }

    public function execute(SurveyPdf $surveyPdf, AnswersFilterData $answersFilterData): array
    {
        ini_set('memory_limit', '4095M');
        $date_start = $answersFilterData->date_from;
        $date_end = $answersFilterData->date_to;
        $answersFilterData = SurveyResponse::getResponsesForSurvey($surveyPdf->survey_id)->where('submitdate', '!=', null);
        $all_questions = $surveyPdf->questions;
        $question_contact_email = $surveyPdf->question_contact_email;
        Assert::notNull($question_contact_email, '['.__FILE__.']['.__LINE__.']');
        $q = app(GetQuestionBreadsByTitleAction::class)->execute($question_contact_email, $all_questions);
        $answer_field_name = app(GetAnswerFieldNameByQuestionCollAction::class)->execute($q);
        $u_table = 'lime_tokens_'.$surveyPdf->survey_id;
        $answers_table = 'lime_survey_'.$surveyPdf->survey_id;
        $select = [];
        $select[] = $answer_field_name.' as contact_email';
        $select[] = 'u.attribute_1';
        $select[] = 'u.attribute_2';
        $select[] = 'u.attribute_3';
        $select[] = 'u.attribute_4';
        $select[] = 'submitdate';
        $rows = $answersFilterData
            ->selectRaw(implode(',', $select))
            ->whereRaw('LENGTH('.$answer_field_name.')>3')
            ->join($u_table.' as u', static function ($join) use ($answers_table): void {
                $join->on('u.token', '=', $answers_table.'.token');
            });
        if (is_null($date_start) && is_null($date_end)) {
            $rows = $rows->whereRaw('submitdate >= now()-interval 3 month ');
        }

        if (! is_null($date_start)) {
            $rows = $rows->where('submitdate', '>=', $date_start);
        }

        if (! is_null($date_end)) {
            $rows = $rows->where('submitdate', '<=', $date_end);
            if (is_null($date_start)) {
                $rows = $rows->whereRaw('submitdate >= now()-interval 3 month ');
            }
        }

        return $rows->get()->toArray();

        // return ArrayService::make()
        //         // ->setFilename($parent_row->name.'_contact_emails'.'-'.date('d-m-Y'))
        //         ->setFilename($survey_pdf->name.'_contact_emails_Sett_'.date('W'))
        //         ->setArray($data)
        //         ->toXLS();
    }
}
