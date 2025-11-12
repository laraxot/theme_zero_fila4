<?php

declare(strict_types=1);

namespace Modules\Quaeris\Models;

use Modules\Xot\Models\BaseExtra;

class Extra extends BaseExtra
{
    /** @var string */
    protected $connection = 'quaeris';
}
