<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeSurvey299355Timings;

class LimeSurvey299355TimingsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeSurvey299355Timings::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'interviewtime' => $this->faker->randomFloat(),
            '299355X1029time' => $this->faker->randomFloat(),
            '299355X1029X33153time' => $this->faker->randomFloat(),
            '299355X1029X33154time' => $this->faker->randomFloat(),
            '299355X1029X33155time' => $this->faker->randomFloat(),
            '299355X1030time' => $this->faker->randomFloat(),
            '299355X1030X33156time' => $this->faker->randomFloat(),
            '299355X1031time' => $this->faker->randomFloat(),
            '299355X1031X33157time' => $this->faker->randomFloat(),
            '299355X1031X33158time' => $this->faker->randomFloat(),
            '299355X1032time' => $this->faker->randomFloat(),
            '299355X1032X33159time' => $this->faker->randomFloat(),
            '299355X1032X33160time' => $this->faker->randomFloat(),
            '299355X1032X33161time' => $this->faker->randomFloat(),
            '299355X1032X33162time' => $this->faker->randomFloat(),
            '299355X1032X33163time' => $this->faker->randomFloat(),
            '299355X1032X33164time' => $this->faker->randomFloat(),
        ];
    }
}
