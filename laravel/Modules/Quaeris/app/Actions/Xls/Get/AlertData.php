<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions\Xls\Get;

use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Modules\Limesurvey\Models\LimeQuestion;
use Modules\Limesurvey\Models\LimeSurvey;
use Modules\Quaeris\Actions\Question\GetAnswerFieldNameByQuestionCollAction;
use Modules\Quaeris\Actions\Question\GetParticipantByAskAction;
use Modules\Quaeris\Actions\Question\GetQuestionBreadsByTitleAction;
use Modules\Quaeris\Actions\Question\GetSurveysAction;
use Modules\Quaeris\Actions\Question\GetValueByQuestionPropsAction;
use Modules\Quaeris\Datas\AnswersFilterData;
use Modules\Quaeris\Models\SurveyPdf;
use function Safe\ini_set;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class AlertData
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
        ini_set('memory_limit', '-1');
        $date_start = $answersFilterData->date_from;
        $date_end = $answersFilterData->date_to;
        // $all_questions = app(GetQuestionsBySurveyIdAction::class)->execute((string)$survey_pdf->survey_id);
        $all_questions = $surveyPdf->questions;
        if (! \is_array($surveyPdf->xls_field_1)) {
            $questions = explode(',', (string) $surveyPdf->xls_field_1);
        } else {
            $questions = $surveyPdf->xls_field_1;
        }

        $questions = collect($questions)->map(static fn ($title) => app(GetQuestionBreadsByTitleAction::class)->execute($title, $all_questions));
        $questions_bf = $questions->filter(static function (Collection $item): bool {
            Assert::isInstanceof($itm = $item[0], LimeQuestion::class);

            return \in_array($itm['type'], ['B', 'F', '!'], false);
        });
        // $groups = app(GetSurveysAction::class)->execute()
        //     ->find($survey_pdf->survey_id)
        //     ->groups_l10n
        //     ->pluck('group_name', 'gid')
        //     ->all();

        $limeSurvey = app(GetSurveysAction::class)->execute()
            ->find($surveyPdf->survey_id);
        if ($limeSurvey === null) {
            throw new Exception('limeSurvey is null');
        }
        Assert::isInstanceOf($limeSurvey, LimeSurvey::class);
        // dddx([$limeSurvey, $limeSurvey->groups_l10n]);
        $groups = $limeSurvey->groups_l10n
            ->pluck('group_name', 'gid')
            ->all();

        // dddx([
        //     $questions->diff($questions_bf),
        //     // collect($questions)->diff($questions_bf)
        //     // $groups,
        //     // $all_questions,
        //     // $questions,
        //     // $questions_bf

        // ]);
        $questions_others = $questions->diff($questions_bf)
            ->map(static function (Collection $item) use ($groups, $all_questions): array {
                $qt_title = '';
                Assert::isInstanceof($lime_question = $item[0], LimeQuestion::class);
                if (! \is_string($lime_question['title'])) {
                    throw new Exception('['.__LINE__.']['.class_basename(self::class).']');
                }

                if (Str::endsWith($lime_question['title'], 'c')) {
                    $q_tmp = Str::before($lime_question['title'], 'c');
                    $qt = app(GetQuestionBreadsByTitleAction::class)->execute($q_tmp, $all_questions);
                    $qt_title = strip_tags((string) $qt->pluck('question')->implode('-'));
                    $qt_title .= ' - ';
                }

                $gid = $lime_question['gid'];
                Assert::string($groups[$gid]);
                $title = $groups[$gid].' - '.$qt_title.strip_tags((string) $item->pluck('question')->implode('-'));
                $lime_question['comment_title'] = $title;

                return $item->toArray();
            });
        $questions_others = collect($questions)->diff($questions_bf);

        $answers_class = LimeSurvey::class.$surveyPdf->survey_id;
        $answers = app($answers_class)
            ->where('submitdate', '!=', null);

        // $answers = SurveyResponse::getResponsesForSurvey($surveyPdf->survey_id)
        //     ->where('submitdate', '!=', null);

        // dddx([
        //     $answers->first(),
        //     $answers_mew->first()
        // ]);

        $answers = $answers->whereRaw('submitdate >= now()-interval 1 month ');

        $answersFilterData = [];
        foreach ($answers->get() as $ask) {
            $qi = 0;
            foreach ($questions_bf as $question_bf) {
                $item = $question_bf;
                $answer_field_name = app(GetAnswerFieldNameByQuestionCollAction::class)->execute($item);
                $value = app(GetValueByQuestionPropsAction::class)->execute($ask, $item);
                if (is_numeric($value) && $value <= 5) {
                    $u = app(GetParticipantByAskAction::class)->execute($ask, (string) $surveyPdf->survey_id);
                    $domanda = strip_tags((string) $question_bf->pluck('question')->implode('-'));
                    $tmp = [
                        'domanda' => $domanda,
                        'value' => $value,
                        'email' => $u->email ?? '',
                        'token' => $u->token ?? '',
                        'attribute_1' => $u->attribute_1 ?? '',
                        'attribute_2' => $u->attribute_2 ?? '',
                        'attribute_3' => $u->attribute_3 ?? '',
                        'attribute_4' => $u->attribute_4 ?? '',
                        'submit_at' => $ask->submitdate,
                    ];
                    foreach ($questions_others as $question_other) {
                        Assert::isInstanceof($item = $question_other, Collection::class);
                        Assert::isInstanceof($item[0], LimeQuestion::class);

                        $comment_title = $item[0]['comment_title'];
                        $comment_value = app(GetValueByQuestionPropsAction::class)->execute($ask, $item);
                        $tmp[$comment_title] = '';
                        if ($qi === 0) {
                            $tmp[$comment_title] = $comment_value;
                        }
                    }

                    ++$qi;
                    $answersFilterData[] = $tmp;
                }
            }
        }

        return $answersFilterData;

        // return ArrayService::make()
        //     // ->setFilename($survey_pdf->name.'_alert'.'-'.date('d-m-Y'))
        //     ->setFilename($survey_pdf->name.'_alert_Sett_'.date('W'))
        //     ->setArray($data)
        //     ->toXLS();
        // // ->toHtml();
    }
}
