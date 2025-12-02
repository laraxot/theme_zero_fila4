<?php

declare(strict_types=1);

namespace Modules\Quaeris\Datas;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\Data;

class QuestionData extends Data
{
    public string $type;

    public ?string $title = null;

    public ?string $subtitle = null;

    public string $question;

    // $qid
    public string $subquestion = '';

    public ?string $group_by = null;

    public ?string $sort_by = null;

    public ?string $take = null;

    public string $survey_id;

    public ?string $survey_pdf_id = null;

    public string|Carbon|null $date_from = null;

    public string|Carbon|null $date_to = null;

    public ?string $group_name = null;

    public ?string $mandatory = null;

    public ?bool $show_tot_invited = null;

    public int $tot = 1;

    public int $tot_nulled = 0;

    public ?string $answer_value = null;

    public ?array $legend = null;

    public ?string $footer = null;

    public ?float $avg = null;

    public ?string $data_type = null;

    public static function fromModel(Model $model): self
    {
        $data = $model->toArray();
        $data['question'] = $data['qid'];
        $data['survey_id'] = $data['sid'];

        // $data['group_by'] = $question_group_by;
        return self::from($data);
    }
}
