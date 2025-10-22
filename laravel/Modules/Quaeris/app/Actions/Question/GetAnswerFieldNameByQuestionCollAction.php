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

class GetAnswerFieldNameByQuestionCollAction
{
    use QueueableAction;

    /**
     * Undocumented function.
     *
     * @param  Collection<LimeQuestion>  $collection
     */

    public function execute(?Collection $collection): string
    {
        if (! $collection instanceof Collection) {
            return '"_value1"';
        }

        if ($collection[0] === null) {
            throw new Exception('[' . __LINE__ . '][' . __FILE__ . ']');
        }

        // Assert::isArray($question_prop[0]);
        Assert::isInstanceof($collection[0], LimeQuestion::class);
        /**
         * @var string|int
         */
        $sid = $collection[0]['sid'];
        /**
         * @var string|int
         */
        $gid = $collection[0]['gid'];
        /**
         * @var string|int
         */
        $qid = $collection[0]['qid'];
        $field_name = $sid . 'X' . $gid . 'X' . $qid;
        if (isset($collection[1])) {
            // Assert::isArray($question_prop[1]);
            Assert::isInstanceof($collection[1], LimeQuestion::class);
            Assert::string($title = $collection[1]['title']);
            $field_name .= $title;
        }

        return $field_name;
    }
}
