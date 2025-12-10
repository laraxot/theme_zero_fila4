<?php

declare(strict_types=1);

namespace Modules\UI\Datas;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class SliderDataCollection extends Data
{
    /**
     * @var DataCollection<SliderData>
     */
    public DataCollection $slider_data;

    public function __construct() {}
}
