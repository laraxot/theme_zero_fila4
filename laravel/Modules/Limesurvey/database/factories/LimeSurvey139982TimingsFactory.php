<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeSurvey139982Timings;

class LimeSurvey139982TimingsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeSurvey139982Timings::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'interviewtime' => $this->faker->randomFloat(),
            '139982X812time' => $this->faker->randomFloat(),
            '139982X812X30336time' => $this->faker->randomFloat(),
            '139982X812X30337time' => $this->faker->randomFloat(),
            '139982X812X30338time' => $this->faker->randomFloat(),
            '139982X812X30339time' => $this->faker->randomFloat(),
            '139982X812X30340time' => $this->faker->randomFloat(),
            '139982X812X30341time' => $this->faker->randomFloat(),
        ];
    }
}
