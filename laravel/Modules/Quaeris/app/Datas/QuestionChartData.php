<?php

declare(strict_types=1);

namespace Modules\Quaeris\Datas;

use Modules\Chart\Datas\ChartData;
use Spatie\LaravelData\Data;

class QuestionChartData extends Data
{
    public QuestionData $question;
    public ChartData $chart;
}
