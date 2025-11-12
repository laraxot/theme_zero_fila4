<?php

declare(strict_types=1);

namespace Modules\Quaeris\Datas;

use Spatie\LaravelData\Data;

class SurveyAttributeDescriptionData extends Data
{
    public string $name;

    public string $description;

    public string $mandatory;

    public string $show_register;

    public string $cpdbmap;
}
