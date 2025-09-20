<?php
declare(strict_types=1);
namespace Modules\Limesurvey\Models;

use Exception;
use Webmozart\Assert\Assert;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Modules\Quaeris\Datas\DashboardFilterData;
use Modules\Xot\Actions\Query\GetFieldnamesByTablenameAction;

class SurveyResponse extends Model
{
    public string $surveyId = '';
    protected $connection = 'limesurvey'; // Connessione al DB di LimeSurvey

    // Il nome della tabella viene impostato dinamicamente
    public function setTableForSurvey($surveyId)
    {
        $this->surveyId = $surveyId;
        $this->setTable('lime_survey_' . $surveyId);
    }

    // Esempio di recupero risposte in base all'ID del sondaggio
    public static function getResponsesForSurvey($surveyId)
    {
        $instance = new static();
        $instance->setTableForSurvey($surveyId);

        return $instance; // Recupera tutte le risposte dal sondaggio specifico
    }

    public function getFeedback(LimeQuestion $q)
    {
        $results = $q->brothers()
                ->where('relevance', 'like', '%'.$q->full_title.'%')
                ->orWhere('relevance', 'like', '%'.$q->fieldname.'%')
                ->get()
                ;
        $html = '';

        // if($q->title == '02'){
        //     dddx([$q, $q->fieldname , $results->pluck('qid'), $results->count()]);
        // }

        // dddx([$q, $q->fieldname , $results->pluck('qid'), $results->count()]);

        // if($q->fieldname == '946595X2254X48244'){
        //     dddx($q);
        // }

        // if($results->count() > 0){
        //     dddx($results);
        // }

        foreach($results as $row){
            // dddx([$results, $row, $row->field_name]);
            $html = $this->{$row->field_name};
        }
        return $html;
    }


    public function getFeedbackByTitle(LimeQuestion $q):?string{

        $question_c = $q->brothers->firstWhere('title', $q->title.'c');
        $feedback = null;
        if ($question_c === null && $q->parent !== null){
            $parent_question = $q->brothers->firstWhere('title', $q->parent->title.'c');
            if ($parent_question !== null) {
                Assert::isInstanceOf($parent_question, LimeQuestion::class);
                $field = $parent_question->sid.'X'.$parent_question->gid.'X'.$parent_question->qid;
                $feedback = $this->{$field};
            }
        }elseif ($question_c !== null) {
            $question_field_name = $question_c->field_name;
            $feedback = $this->{$question_field_name};
        }

        return $feedback;

        // return 'WIP';

        // (ipotesi) i feedback  sono delle colonne che vengono abilitate con delle regole 
        // circa come i campi in cui definiamo la visibility 

        // questa regola e' nel campo "relevance"

        // e sono del tipo
        // (((!is_empty(39275X41X487SQ001.NAOK) && (39275X41X487SQ001.NAOK <= 5))))
        // o
        // ((39275X41X483.NAOK == "N"))
        // o
        // ((Q25_SQ001.NAOK > 5) or (Q35_SQ001.NAOK > 5) or (Q47_SQ001.NAOK > 5) or (Q53_SQ001.NAOK > 5) or (Q63_SQ001.NAOK > 5) or (  is_empty(Q25_SQ001.NAOK)   and  is_empty(Q35_SQ001.NAOK)   and  is_empty(Q47_SQ001.NAOK)  and is_empty(Q53_SQ001.NAOK)  and  is_empty(Q63_SQ001.NAOK)  ))
        // o 
        // ((( ! is_empty(Q35_SQ001.NAOK) && (Q35_SQ001.NAOK <= 5))))

        // percio' o c'e' il nome del fieldname di riferimento, 
        // se non c'e' padre il titolo della question , 
        // e se c'e' il padre e' il titolo del padre ."_" . titolo del figlio
       
    }

    /**
     * Undocumented function
     *
     * @param Builder|Builder $query
     *
     * @return Builder|Builder
     */
    public function scopeWithAnswersLabel($query, string $qid, string $field_name, string $prefix = '', string $type = 'join')
    {
        $ask_table = 'lime_answers';
        $ask_table_lang = 'lime_answer_l10ns';
        if ($type === 'subquery') {
            return $query
                ->addSelect([
                    $prefix.'answer' => LimeAnswer::select('answer')
                        ->leftJoin($ask_table_lang, static function ($join): void {
                            $join->on('lime_answers.aid', '=', 'lime_answer_l10ns.aid')
                                ->whereRaw('language="it"');
                        })
                        ->whereColumn('code', $field_name)
                        ->where('qid', $qid)
                        ->take(1),
                ]);
        }
        if ($type === 'join') {
            return $query // ->selectRaw('*,ask_lang.answer as label')
            //->addSelect(''.$prefix.'ask_lang.answer')
            //->addSelect(DB::Raw($this->getTable().'.*'))
                ->addSelect(DB::Raw($this->getTable().'.'.$this->getKeyName().' as _id'))
                ->addSelect(DB::Raw(''.$prefix.'ask_lang.answer as '.$prefix.'answer'))
                ->leftJoin($ask_table.' as '.$prefix.'ask', static function ($join) use ($qid, $field_name, $prefix): void {
                    $join->on(''.$prefix.'ask.code', '=', $field_name)
                        ->whereRaw(''.$prefix.'ask.qid = "'.$qid.'"');
                })->leftJoin($ask_table_lang.' as '.$prefix.'ask_lang', static function ($join) use ($prefix): void {
                    $join->on(''.$prefix.'ask.aid', '=', ''.$prefix.'ask_lang.aid')
                        ->whereRaw(''.$prefix.'ask_lang.language="it"');
                });
        }
        throw new Exception('type not in [join,subquery]');
    }

    public function scopeWithAllAnswers(Builder $query, string $type = 'join'): Builder
    {
        $questions = LimeQuestion::where('sid', $this->surveyId)
            ->whereNotIn('type', ['X'])
            ->get()
        ;

        $table = 'lime_survey_'.$this->surveyId;
        $fieldnames = app(GetFieldnamesByTablenameAction::class)->execute($table, 'limesurvey');


        foreach ($questions as $q) {
            Assert::isInstanceOf($q, LimeQuestion::class, '['.__LINE__.']['.class_basename(self::class).']');

            if(!in_array($q->fieldname, $fieldnames)) {
                continue;
            }

            $main = $q->qid;
            if ($q->parent_qid !== 0) {
                $main = $q->parent_qid;
            }
            if($q->hasTrans()) {
                $query = $query->withAnswersLabel($main, $q->fieldName, $q->fieldName, 'subquery');
            }
        }

        return $query;
    }

    /**
     * Undocumented function
     *
     * @param Builder|Builder $query
     *
     * @return Builder|Builder
     */
    public function scopeWithParticipants(Builder $builder): Builder
    {
        $survey_id = $this->surveyId;
        $participants_table = 'lime_tokens_'.$survey_id;
        $survey_table = 'lime_survey_'.$survey_id;

        return $builder
            ->join($participants_table.' as u', static function ($join) use ($survey_table): void {
                $join->on('u.token', '=', $survey_table.'.token');
            });
    }

    public function scopeOfDashboardFilterData(Builder $query, DashboardFilterData $filter): Builder
    {

        $query = $query->where('submitdate', '>=', $filter->startDate)
            ->where('submitdate', '<=', $filter->endDate)
        ;

        if ($filter->question_filter !== null) {
            $filter_field = $filter->question_filter_fieldname;
            if ($filter_field !== null) {
                $query = $query->where($filter_field, $filter->question_filter);
            }
        }

        return $query;
    }
}
