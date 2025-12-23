<?php

declare(strict_types=1);

namespace Modules\UI\Datas;

use Spatie\LaravelData\Data;

class SliderData extends Data
{
    public function __construct(
        public null|string $desktop_thumbnail,
        public null|string $mobile_thumbnail,
        public null|string $desktop_thumbnail_webp,
        public null|string $mobile_thumbnail_webp,
        public null|string $link,
        public null|string $title,
        public null|string $short_description,
        public null|string $description,
        public null|string $action_text,
    ) {
        $this->short_description = $this->description;
    }
}
