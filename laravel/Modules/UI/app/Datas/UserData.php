<?php

declare(strict_types=1);

namespace Modules\UI\Datas;

use Spatie\LaravelData\Data;

class UserData extends Data
{
    public function __construct(
        public int $id,
        public string $name,
        public string $email,
        public null|string $avatar,
        public null|string $role,
        public array $permissions,
        public array $settings,
    ) {}
}
