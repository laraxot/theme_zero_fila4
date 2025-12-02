<?php

declare(strict_types=1);

/**
 * Created by Reliese Model.
 */

namespace Modules\Limesurvey\Models;

use Modules\Xot\Models\Extra as BaseExtra;

class Extra extends BaseExtra
{
    /** @var string */
    protected $connection = 'limesurvey';
}
