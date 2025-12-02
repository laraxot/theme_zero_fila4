<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeSurvey628829Timings;

class LimeSurvey628829TimingsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeSurvey628829Timings::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'interviewtime' => $this->faker->randomFloat(),
            '628829X1070time' => $this->faker->randomFloat(),
            '628829X1070X33470time' => $this->faker->randomFloat(),
            '628829X1070X33471time' => $this->faker->randomFloat(),
            '628829X1065time' => $this->faker->randomFloat(),
            '628829X1065X33488time' => $this->faker->randomFloat(),
            '628829X1065X33489time' => $this->faker->randomFloat(),
            '628829X1065X33398time' => $this->faker->randomFloat(),
            '628829X1065X33399time' => $this->faker->randomFloat(),
            '628829X1065X33400time' => $this->faker->randomFloat(),
            '628829X1065X33401time' => $this->faker->randomFloat(),
            '628829X1065X33474time' => $this->faker->randomFloat(),
            '628829X1065X33473time' => $this->faker->randomFloat(),
            '628829X1066time' => $this->faker->randomFloat(),
            '628829X1066X33490time' => $this->faker->randomFloat(),
            '628829X1066X33465time' => $this->faker->randomFloat(),
            '628829X1066X33426time' => $this->faker->randomFloat(),
            '628829X1066X33448time' => $this->faker->randomFloat(),
            '628829X1066X33449time' => $this->faker->randomFloat(),
            '628829X1066X33456time' => $this->faker->randomFloat(),
            '628829X1066X33457time' => $this->faker->randomFloat(),
            '628829X1067time' => $this->faker->randomFloat(),
            '628829X1067X33466time' => $this->faker->randomFloat(),
            '628829X1068time' => $this->faker->randomFloat(),
            '628829X1068X33404time' => $this->faker->randomFloat(),
            '628829X1068X33405time' => $this->faker->randomFloat(),
            '628829X1068X33406time' => $this->faker->randomFloat(),
            '628829X1069time' => $this->faker->randomFloat(),
            '628829X1069X33467time' => $this->faker->randomFloat(),
            '628829X1069X33468time' => $this->faker->randomFloat(),
            '628829X1069X33469time' => $this->faker->randomFloat(),
            '628829X1069X33472time' => $this->faker->randomFloat(),
        ];
    }
}
