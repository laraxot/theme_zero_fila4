<?php

declare(strict_types=1);

namespace Modules\Quaeris\Actions\QuestionChart;

use Exception;
use Illuminate\Support\Str;
use Modules\Limesurvey\Models\LimeQuestion;
use Modules\Quaeris\Actions\Question\GetAnswerFieldNameByQuestionIdAction;
use Spatie\QueueableAction\QueueableAction;

class GetPieceQueryBySurveyIdAction
{
    use QueueableAction;

    public function execute(string $survey_id, string $str, string $type = 'name', ?string $fieldname = 'submitdate'): string
    {
        if ($str === '') {
            $str = 'null';
        }

        $month = match ($type) {
            'name' => 'b',
            default => 'm',
        };

        if (Str::startsWith($str, 'date:')) {
            $format = Str::after($str, 'date:');
            switch ($format) {
                case 'Y-M':
                    $str = 'DATE_FORMAT('.$fieldname.', "%Y-%'.$month.'")';
                    break;
                case 'o-W':
                    $str = 'concat(substr(YEARWEEK('.$fieldname.'),1,4)," - ",substr(YEARWEEK('.$fieldname.'),-2))';
                    break;
                case 'Y-m':
                    $str = 'DATE_FORMAT('.$fieldname.', "%Y-%'.$month.'")';
                    break;
                case 'Y-m-d':
                case 'Y-M-d':
                    $str = 'DATE_FORMAT('.$fieldname.', "%Y-%'.$month.'-%d")';
                    break;
                default:
                    dddx($format);
            }

            return $str;
        }

        if ($str === '_value') {
            $str = '"_value"';
        }

        if (Str::startsWith($str, 'field:')) {
            $field = Str::after($str, 'field:');
            $q = LimeQuestion::where('sid', $survey_id)
                ->where('title', $field)->first();
            if ($q === null) {
                throw new Exception('['.__LINE__.']['.__FILE__.']');
            }

            return app(GetAnswerFieldNameByQuestionIdAction::class)->execute((string) $q->qid);
        }

        return $str;
    }
}
