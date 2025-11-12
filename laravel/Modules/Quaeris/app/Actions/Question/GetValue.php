<?php

declare(strict_types=1);

namespace Modules\Quaeris\Actions\Question;

use Illuminate\Database\Eloquent\Collection;
use Modules\Limesurvey\Contracts\LimeSurveyXXXContract;
use Modules\Limesurvey\Models\LimeQuestion;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class GetValue
{
    use QueueableAction;

    // Parameter #1 $questions of method Modules\Quaeris\Actions\Question\GetValue::execute() expects
    // Illuminate\Database\Eloquent\Collection,
    // Illuminate\Support\Collection<int, Modules\Limesurvey\Models\LimeQuestion> given.
    /**
     * @param Collection|\Illuminate\Support\Collection<int, LimeQuestion> $questions
     */
    public function execute($questions, array|bool|int|string|null $value, string $field_name, LimeSurveyXXXContract $row): array|bool|int|string|null
    {
        if ($value === null) {
            return $value;
        }
        /**
         * @var LimeQuestion|null
         */
        $question = $questions->firstWhere('field_name', $field_name);
        if ($question === null) {
            return $value;
        }
        if (! is_null($value_cache = $question->getExtra('value_'.$field_name.'_'.$row->id))) {
            return $value_cache;
        }

        $full_type = $question->getFullType();

        switch ($full_type) {
            case 'FT':
            case 'FF':
                Assert::notNull($question->parent, '['.__FILE__.']['.__LINE__.']');
                Assert::notNull($question->parent->props->firstWhere('code', $value), '['.__FILE__.']['.__LINE__.']');
                Assert::notNull($question->parent->props->firstWhere('code', $value)->l10n, '['.__FILE__.']['.__LINE__.']');
                $value = $question->parent->props->firstWhere('code', $value)->l10n->answer;
                break;
            case '!':
                Assert::notNull($question->props->firstWhere('code', $value), '['.__FILE__.']['.__LINE__.']');
                Assert::notNull($question->props->firstWhere('code', $value)->l10n, '['.__FILE__.']['.__LINE__.']');
                $value = $question->props->firstWhere('code', $value)->l10n->answer;
                break;
            case 'L':
                Assert::notNull($question->props->firstWhere('code', $value), '['.__FILE__.']['.__LINE__.']');
                Assert::notNull($question->props->firstWhere('code', $value)->l10n, '['.__FILE__.']['.__LINE__.']');
                $res = $question->props->firstWhere('code', $value)->l10n->answer;
                if ($res === null) {
                    //return $value;
                    break;
                }

                $value = $res;
                break;
            case 'BT':
            case 'BB':
            case 'T':
            case 'MT':
            case 'S':
                //return $value;
                break;
            case 'N':
            case 'Y':
                //return $value;
                break;
        }
        $question->setExtra('value_'.$field_name.'_'.$row->id, $value);
        /*
        Assert::notNull($question->props->firstWhere('code', $value), '['.__FILE__.']['.__LINE__.']');
        Assert::notNull($question->props->firstWhere('code', $value)->l10n, '['.__FILE__.']['.__LINE__.']');
        Assert::notNull($question->parent?->props->firstWhere('code', $value)?->l10n, '['.__FILE__.']['.__LINE__.']');
        dddx(['full_type' => $full_type,
            'value' => $value,
            'parent_prop' => $question->parent->props->firstWhere('code', $value)->l10n->answer,
            'curr_prop' => $question->props->firstWhere('code', $value)->l10n->answer,
            'question' => $question]);
        */
        return $value;
    }
}
