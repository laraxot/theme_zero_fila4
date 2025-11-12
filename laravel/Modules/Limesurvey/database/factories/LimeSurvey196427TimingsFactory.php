<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeSurvey196427Timings;

class LimeSurvey196427TimingsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeSurvey196427Timings::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'interviewtime' => $this->faker->randomFloat(),
            '196427X1028time' => $this->faker->randomFloat(),
            '196427X1028X33144time' => $this->faker->randomFloat(),
            '196427X1028X33152time' => $this->faker->randomFloat(),
            '196427X1028X33145time' => $this->faker->randomFloat(),
            '196427X1028X33146time' => $this->faker->randomFloat(),
            '196427X1028X33147time' => $this->faker->randomFloat(),
            '196427X1028X33148time' => $this->faker->randomFloat(),
            '196427X1028X33149time' => $this->faker->randomFloat(),
            '196427X1028X33150time' => $this->faker->randomFloat(),
            '196427X1028X33151time' => $this->faker->randomFloat(),
        ];
    }
}
