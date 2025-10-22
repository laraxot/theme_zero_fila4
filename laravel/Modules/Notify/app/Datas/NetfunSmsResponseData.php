<?php

declare(strict_types=1);


namespace Modules\Notify\Datas;

use Spatie\LaravelData\Data;

class NetfunSmsResponseData extends Data
{
    public function __construct(
        public string $status,
        public null|string $batchId = null,
        public null|array $messages = null,
        public null|string $error = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            status: $data['status'],
            batchId: $data['batchId'] ?? null,
            messages: $data['messages'] ?? null,
            error: $data['error'] ?? null,
        );
    }
}
