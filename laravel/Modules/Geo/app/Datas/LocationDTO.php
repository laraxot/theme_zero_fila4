<?php

declare(strict_types=1);

namespace Modules\Geo\Datas;

readonly class LocationDTO
{
    public function __construct(
        public  float $latitude,
        public  float $longitude,
        public  null|string $address = null,
        public  null|string $city = null,
        public  null|string $country = null,
    ) {}

    public function toArray(): array
    {
        return [
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'address' => $this->address,
            'city' => $this->city,
            'country' => $this->country,
        ];
    }
}
