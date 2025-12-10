<?php

declare(strict_types=1);

namespace Modules\Quaeris\Actions\Question;

use Illuminate\Support\Collection;
use Exception;
use Modules\Limesurvey\Models\BaseModel;
use Modules\Limesurvey\Models\LimeQuestion;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class GetValueByQuestionPropsAction
{
    use QueueableAction;

    /**
     * //@param  Collection<int, LimeQuestion>  $question_prop
     *
     * @param Collection $question_prop
     */
    public function execute(BaseModel $baseModel, $question_prop): ?string
    {
        // $field_name = $this->getAnswerFieldName($question_prop);
        $field_name = app(GetAnswerFieldNameByQuestionCollAction::class)->execute($question_prop);

        if ($question_prop[0] === null) {
            throw new Exception('[' . __LINE__ . '][' . __FILE__ . ']');
        }

        Assert::isInstanceOf($question_prop[0], LimeQuestion::class);
        $answeroptions = $question_prop[0]->props->keyBy('code');

        $res = $baseModel->{$field_name};

        $answer_option = $answeroptions->get($res);
        $linked_value = null;
        if (is_object($answer_option)) {
            $ao = $answer_option;
            $linked_value = $ao->answer;
        }

        $value = null;
        switch ($question_prop[0]['type']) {
            case 'F':
                $value = $linked_value;
                break;
            case 'B':
            case 'T':
                $value = $res;
                break;
            case 'L':
            case '!':
                $value = $linked_value;
                break;
            case 'S':
                $value = $res;
                break;
            default:
                dddx(['res' => $res, 'prop' => $question_prop[0], 'field_name' => $field_name, 'linked_value' => $linked_value]);
                throw new Exception('[' . __LINE__ . '][' . __FILE__ . ']');
        }

        return $value;
    }
}
