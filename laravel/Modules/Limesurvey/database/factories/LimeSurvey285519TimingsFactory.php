<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeSurvey285519Timings;

class LimeSurvey285519TimingsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeSurvey285519Timings::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'interviewtime' => $this->faker->randomFloat(),
            '285519X1033time' => $this->faker->randomFloat(),
            '285519X1033X33181time' => $this->faker->randomFloat(),
            '285519X1033X33182time' => $this->faker->randomFloat(),
            '285519X1033X33183time' => $this->faker->randomFloat(),
            '285519X1034time' => $this->faker->randomFloat(),
            '285519X1034X33184time' => $this->faker->randomFloat(),
            '285519X1035time' => $this->faker->randomFloat(),
            '285519X1035X33185time' => $this->faker->randomFloat(),
            '285519X1035X33186time' => $this->faker->randomFloat(),
            '285519X1036time' => $this->faker->randomFloat(),
            '285519X1036X33187time' => $this->faker->randomFloat(),
            '285519X1036X33188time' => $this->faker->randomFloat(),
            '285519X1036X33189time' => $this->faker->randomFloat(),
            '285519X1036X33190time' => $this->faker->randomFloat(),
            '285519X1036X33191time' => $this->faker->randomFloat(),
            '285519X1036X33192time' => $this->faker->randomFloat(),
        ];
    }
}
