<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeSurvey568792Timings;

class LimeSurvey568792TimingsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeSurvey568792Timings::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'interviewtime' => $this->faker->randomFloat(),
            '568792X987time' => $this->faker->randomFloat(),
            '568792X987X32761time' => $this->faker->randomFloat(),
            '568792X988time' => $this->faker->randomFloat(),
            '568792X988X32785time' => $this->faker->randomFloat(),
            '568792X989time' => $this->faker->randomFloat(),
            '568792X989X32745time' => $this->faker->randomFloat(),
            '568792X989X32746time' => $this->faker->randomFloat(),
            '568792X993time' => $this->faker->randomFloat(),
            '568792X993X32799time' => $this->faker->randomFloat(),
            '568792X993X32800time' => $this->faker->randomFloat(),
            '568792X993X32801time' => $this->faker->randomFloat(),
            '568792X994time' => $this->faker->randomFloat(),
            '568792X994X32802time' => $this->faker->randomFloat(),
            '568792X994X32803time' => $this->faker->randomFloat(),
            '568792X994X32804time' => $this->faker->randomFloat(),
            '568792X994X32808time' => $this->faker->randomFloat(),
            '568792X990time' => $this->faker->randomFloat(),
            '568792X990X32747time' => $this->faker->randomFloat(),
            '568792X990X32809time' => $this->faker->randomFloat(),
            '568792X990X32810time' => $this->faker->randomFloat(),
            '568792X990X32811time' => $this->faker->randomFloat(),
            '568792X990X32812time' => $this->faker->randomFloat(),
            '568792X991time' => $this->faker->randomFloat(),
            '568792X991X32759time' => $this->faker->randomFloat(),
            '568792X991X32760time' => $this->faker->randomFloat(),
            '568792X991X32762time' => $this->faker->randomFloat(),
            '568792X991X32763time' => $this->faker->randomFloat(),
        ];
    }
}
