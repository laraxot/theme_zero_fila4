<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Quaeris\Actions\QuestionChart\Custom\Custom;

use Modules\Chart\Datas\AnswerData;
use Spatie\LaravelData\DataCollection;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class MergeInvitedAnswers
{
    use QueueableAction;

    /**
     * Execute the action.
     *
     * @return DataCollection<AnswerData>
     */
    public function execute(DataCollection $invited_rows, DataCollection $answers_rows): DataCollection
    {
        $data = [];
        foreach ($invited_rows as $row) {
            Assert::isInstanceOf($row, AnswerData::class);
            $k = $row->label;
            if (! isset($data[$k])) {
                $data[$k] = [];
                $data[$k]['label'] = $row->label;
                $data[$k]['_sort'] = $row->_sort;
                $data[$k]['value']['invited'] = 0;
                $data[$k]['value']['answers'] = 0;
            }
            $data[$k]['value']['invited'] = $row->value;
        }

        foreach ($answers_rows as $row) {
            Assert::isInstanceOf($row, AnswerData::class);
            $k = $row->label;
            if (! isset($data[$k])) {
                $data[$k] = [];
                $data[$k]['label'] = $row->label;
                $data[$k]['_sort'] = $row->_sort;
                $data[$k]['value']['invited'] = 0;
                $data[$k]['value']['answers'] = 0;
            }
            $data[$k]['value']['answers'] = $row->value;
        }

        foreach ($data as $k => $row) {
            $data[$k]['avg'] = 0;
            if ($row['value']['invited'] !== 0) {
                Assert::numeric($answers = $row['value']['answers']);
                Assert::numeric($invited = $row['value']['invited']);
                $data[$k]['avg'] = number_format($answers * 100 / $invited, 1).'%';
            }
        }

        // dddx($q->take);//0 !!!
        $data = collect($data)
            ->sortBy('_sort')
            ->take(-10)
            ->toArray();
        /**
         * @var DataCollection<AnswerData>
         */
        return AnswerData::collect($data, DataCollection::class);
    }
}
