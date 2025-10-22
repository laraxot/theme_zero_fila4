<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions\Question;

use Exception;
use Illuminate\Support\Collection;
use Modules\Limesurvey\Models\LimeQuestion;
use Modules\Limesurvey\Models\LimeSurvey;
use Modules\Xot\Services\Memoization;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class GetQuestionBreadsByQuestionIdSurveyIdAction
{
    use QueueableAction;

    //public ?Collection $res=null;

    /**
     * @return Collection<int, LimeQuestion>
     */

    public function execute(string $question_id, string $survey_id): ?Collection
    {
        //if($this->res!=null){
        //    return $this->res;
        // }
        $cache_key = $survey_id . '-' . $question_id;
        //$seconds = 3600;

        $value = Memoization::make()->memoize($cache_key, fn (): ?Collection => $this->handle($question_id, $survey_id));
        /*
            $value = Cache::remember($cache_key, $seconds, function () use ( $question_id,$survey_id){
                return $this->handle( $question_id,$survey_id);
            });
            */
        Assert::isInstanceOf($value, Collection::class);
        return $value;
        //$this->res=$this->handle( $question_id,$survey_id);

        //return $this->res;
    }

    /**
     * @return Collection<int, LimeQuestion>|null
     */
    public function handle(string $question_id, string $survey_id): ?Collection
    {
        $q = collect([]);
        $survey = LimeSurvey::with([/*'lang',*/ /*'questions'*/])
            ->findOrFail($survey_id);
        $question = $survey
            ->questions
            ->where('qid', $question_id)
            ->first();
        if ($question === null) {
            return null;
        }

        $q = $q->prepend($question);
        if ($question->parent_qid !== 0) {
            $question = $survey
                ->questions
                ->where('qid', $question->parent_qid)
                ->first();
            if (is_null($question)) {
                throw new Exception('[' . __LINE__ . '][' . __FILE__ . '], $question is null');
            }

            $q = $q->prepend($question);
        }

        return $q;
    }
}
