<?php

declare(strict_types=1);

namespace Modules\Quaeris\Datas;

use Illuminate\Support\Str;
use Spatie\LaravelData\Data;

class AnswersFilterData extends Data
{
    public ?string $survey_pdf_id = null;

    public ?string $date_from = null;

    public ?string $date_to = null;

    public ?string $question_id = null;

    public ?string $question_filter = null;

    public function getSlug(): string
    {
        $slugs = [
            $this->date_from,
            $this->date_to,
            $this->question_id,
            $this->question_filter,
        ];

        return Str::slug(implode('-', $slugs));
    }
}
