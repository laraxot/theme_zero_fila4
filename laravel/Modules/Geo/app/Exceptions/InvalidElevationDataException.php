<?php

declare(strict_types=1);

namespace Modules\Geo\Exceptions;

use Exception;

class InvalidElevationDataException extends Exception
{
    public function __construct(
        string $message = 'Invalid elevation data',
        int $code = 0,
        null|Exception $previous = null,
    ) {
        parent::__construct($message, $code, $previous);
    }
}
