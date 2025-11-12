<?php

declare(strict_types=1);

namespace Modules\Media\Database\Factories;

use Modules\Media\Models\MediaConvert;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<MediaConvert>
 */
class MediaConvertFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = MediaConvert::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
