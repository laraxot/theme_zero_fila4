<?php

declare(strict_types=1);


namespace Modules\Notify\Datas;

use Spatie\LaravelData\Data;

class NetfunSmsRequestData extends Data
{
    public function __construct(
        public string $token,
        public array $messages,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            token: $data['token'],
            messages: $data['messages'],
        );
    }
}
