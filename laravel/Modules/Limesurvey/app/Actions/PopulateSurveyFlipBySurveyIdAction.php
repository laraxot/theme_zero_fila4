<?php
declare(strict_types=1);
namespace Modules\Limesurvey\Actions;

use Illuminate\Support\Arr;
use Webmozart\Assert\Assert;
use Modules\Limesurvey\Models\LimeQuestion;
use Spatie\QueueableAction\QueueableAction;
use Modules\Limesurvey\Models\SurveyResponse;
use Modules\Limesurvey\Models\SurveyFlipResponse;
use Modules\Xot\Actions\Query\GetFieldnamesByTablenameAction;

//use Modules\Limesurvey\Models\LimeSurvey;

class PopulateSurveyFlipBySurveyIdAction
{
    use QueueableAction;

    public function execute(string $survey_id): void
    {

        $survey_response = SurveyResponse::getResponsesForSurvey($survey_id);
        $max_id = SurveyFlipResponse::where('survey_id', $survey_id)->max('old_id') ?? 0;
        $table = 'lime_survey_'.$survey_id;
        $fieldnames = app(GetFieldnamesByTablenameAction::class)->execute($table, 'limesurvey');

        $questions = LimeQuestion::where('sid', $survey_id)
            ->whereNotIn('type', ['X'])
            ->get();

        $query = $survey_response
            ->withParticipants()
            ->where('submitdate', '!=', null)
            ->withAllAnswers('subquery')
            ->where('id', '>', $max_id);
        // dddx($query->get()->take(1));
        // $to_import = $query->count();

        $rows = $query
            // ->select('*')
            ->addSelect($table.'.id as old_id' )
            // ->inRandomOrder()
            // ->where($table.'.token', 'kto12rdxDz0ZXIk')
            // ->where('submitdate', '>', '2024-01-01')
            ->get()
            ->take(10)
            ;
        // dddx($rows);
        // dddx($rows->take(1));

        /**
         * $row->id non e' corretto
         */
        foreach ($rows as $row) {
            foreach($questions as $q) {
                // dddx([$questions->pluck('fieldname'), $row, $max_id]);
                // if($q->title == 'Q02'){
                //     dddx($q);
                // }
                if(!in_array($q->fieldname, $fieldnames)) {
                    continue;
                }
                $data = [
                    'old_id' => $row->old_id,
                    'survey_id' => $survey_id,
                    'question_id' => $q->qid,
                    'question_type' => $q->type,
                    'answer' => $row->{$q->fieldname},
                    'value' => $row->{$q->fieldname.'answer'},
                    'submitdate' => $row->submitdate,
                    'fieldname' => $q->fieldname,
                    'token' => $row->token,
                    'feedback' => $row->getFeedbackByTitle($q),
                ];


                // if($row->token == 'NbDQyaRWOqFLgwq'){
                //     dddx($row);
                // }


                // Salva solo se almeno uno tra answer e value non è null e non è stringa vuota
                if ((!is_null($data['answer']) && trim($data['answer']) !== '') || 
                    (!is_null($data['value']) && trim($data['value']) !== '')) {
                    $where = Arr::only($data, ['old_id','survey_id','question_id']);
                    SurveyFlipResponse::firstOrCreate($where, $data);
                }
            }
        }
    }


}
