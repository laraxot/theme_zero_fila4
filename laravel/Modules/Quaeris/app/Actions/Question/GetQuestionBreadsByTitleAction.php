<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions\Question;

use Exception;
use Illuminate\Support\Collection;
use Modules\Limesurvey\Models\LimeQuestion;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class GetQuestionBreadsByTitleAction
{
    use QueueableAction;

    // public array $vars = [];
    // public QuestionData $question_data;

    public function execute(string $title, Collection $collection): Collection
    {
        $title_dotted = bracketsToDotted($title);
        $title_arr = explode('.', $title_dotted);
        $q = collect([]);
        $parent_qid = 0;
        foreach ($title_arr as $v) {
            $tmp = $collection->where('parent_qid', $parent_qid)->where('title', $v)->first();
            if ($tmp === null) {
                throw new Exception('$tmp null[ parent_qid ' . $parent_qid . '][title ' . $v . ']');
            }

            Assert::isInstanceof($tmp, LimeQuestion::class);
            $parent_qid = $tmp->qid;
            $q = $q->push($tmp);
        }

        return $q;
    }
}
