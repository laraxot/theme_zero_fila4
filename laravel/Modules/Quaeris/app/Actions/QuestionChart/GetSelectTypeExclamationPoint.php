<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions\QuestionChart;

use Modules\Quaeris\Models\QuestionChart;
use Spatie\QueueableAction\QueueableAction;

class GetSelectTypeExclamationPoint
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(QuestionChart $questionChart, string $group_by, string $sort_by): array
    {
        $field_name = $questionChart->field_name;
        if ($questionChart->data_type === 'zeroTen') {
            $label = '"Media"';
            if (! in_array($group_by, ['', 'null', null], false)) {
                $label = $group_by;
            }

            $select = [];
            $select[] = $label.' as label';
            $select[] = 'count(if(ask_lang.answer REGEXP "^[0-9]+$",ask_lang.answer,NULL )) AS value';
            $select[] = 'AVG(if(ask_lang.answer REGEXP "^[0-9]+$",ask_lang.answer,NULL )) AS avg';
        } else {
            $tot = 0;
            $tot += app(GetAnswersCount::class)->execute($questionChart);
            $tot += app(GetNotAnswersCount::class)->execute($questionChart);
            $select = [];
            $select[] = $field_name.' as _key';
            $select[] = 'ask_lang.answer as label';
            $select[] = 'count('.$field_name.') as value';
            $select[] = 'count('.$field_name.')*100/'.$tot.' as avg';
        }

        return $select;
    }
}

/*
select 39275X42X493 as _key
,ask_lang.answer as label
,count(39275X42X493) as VALUE
,count(39275X42X493)*100/(SELECT COUNT(*) FROM  lime_survey_39275 AS b WHERE b.39275X42X493 is not null and b.submitdate BETWEEN 0 AND '2023-02-26') AS B
from `lime_survey_39275`
inner join `lime_answers` as `ask`
on `ask`.`code` = `39275X42X493`
and ask.qid = "493"
inner join `lime_answer_l10ns` as `ask_lang`
on `ask`.`aid` = `ask_lang`.`aid`
and ask_lang.language="it"
where `submitdate` is not NULL
and `39275X42X493` is not NULL
and `submitdate` between 0
and '2023-02-26'
group by 39275X42X493 order by value desc
*/

/*
 select lime_survey_955466.id,lime_survey_955466.submitdate,lime_survey_955466.token,955466X1141X34096 as _key,ask_lang.answer as _value,null as _group_by,null as _group_by_value,null as _sort_by,"_value1" as _key1,null as _value1,null as _subs from `lime_survey_955466` left join `lime_answers` as `ask0` on `ask0`.`qid` = 34096 and `ask0`.`code` = 955466X1141X34096 left join `lime_answer_l10ns` as `ask_lang` on `ask_lang`.`aid` = `ask0`.`aid` and `ask_lang`.`language` = 'it' where `submitdate` is not null and `submitdate` <= '2023-02-26' and `955466X1141X34096` is not null
 */
