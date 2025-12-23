<?php

declare(strict_types=1);

namespace Modules\Geo\Datas\Photon;

use Spatie\LaravelData\Data;

class PhotonPropertiesData extends Data
{
    public function __construct(
        public null|string $country,
        public null|string $city,
        public null|string $postcode,
        public null|string $street,
        public null|string $housenumber,
    ) {}
}
