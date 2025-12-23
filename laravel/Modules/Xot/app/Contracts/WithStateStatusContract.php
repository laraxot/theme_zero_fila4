<?php

declare(strict_types=1);

namespace Modules\Xot\Contracts;

use Spatie\ModelStates\State;
use Illuminate\Database\Eloquent\Model;

/**
 * @property State $status
 *
 * @phpstan-require-extends Model
 */
interface WithStateStatusContract
{
}
