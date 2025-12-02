<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeSurvey541561Timings;

class LimeSurvey541561TimingsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeSurvey541561Timings::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'interviewtime' => $this->faker->randomFloat(),
            '541561X1003time' => $this->faker->randomFloat(),
            '541561X1003X33065time' => $this->faker->randomFloat(),
            '541561X1003X32948time' => $this->faker->randomFloat(),
            '541561X1003X32949time' => $this->faker->randomFloat(),
            '541561X1003X32950time' => $this->faker->randomFloat(),
            '541561X1003X32951time' => $this->faker->randomFloat(),
            '541561X1003X32955time' => $this->faker->randomFloat(),
            '541561X1003X32957time' => $this->faker->randomFloat(),
            '541561X1003X33000time' => $this->faker->randomFloat(),
            '541561X1003X32958time' => $this->faker->randomFloat(),
            '541561X1003X33004time' => $this->faker->randomFloat(),
            '541561X1003X33005time' => $this->faker->randomFloat(),
            '541561X1003X32973time' => $this->faker->randomFloat(),
            '541561X1003X32946time' => $this->faker->randomFloat(),
            '541561X1003X32947time' => $this->faker->randomFloat(),
        ];
    }
}
