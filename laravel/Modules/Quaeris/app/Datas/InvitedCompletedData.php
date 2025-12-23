<?php

declare(strict_types=1);

namespace Modules\Quaeris\Datas;

use Spatie\LaravelData\Data;

class InvitedCompletedData extends Data
{
    public int $invited = 0;
    public int $completed = 0;
}
