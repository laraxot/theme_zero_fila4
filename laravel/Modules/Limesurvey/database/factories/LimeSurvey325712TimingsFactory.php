<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeSurvey325712Timings;

class LimeSurvey325712TimingsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeSurvey325712Timings::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'interviewtime' => $this->faker->randomFloat(),
            '325712X973time' => $this->faker->randomFloat(),
            '325712X973X32478time' => $this->faker->randomFloat(),
            '325712X974time' => $this->faker->randomFloat(),
            '325712X974X32502time' => $this->faker->randomFloat(),
            '325712X974X32503time' => $this->faker->randomFloat(),
            '325712X974X32504time' => $this->faker->randomFloat(),
            '325712X975time' => $this->faker->randomFloat(),
            '325712X975X32505time' => $this->faker->randomFloat(),
            '325712X978time' => $this->faker->randomFloat(),
            '325712X978X32516time' => $this->faker->randomFloat(),
            '325712X978X32517time' => $this->faker->randomFloat(),
            '325712X978X32518time' => $this->faker->randomFloat(),
            '325712X978X32519time' => $this->faker->randomFloat(),
            '325712X976time' => $this->faker->randomFloat(),
            '325712X976X32520time' => $this->faker->randomFloat(),
            '325712X976X32531time' => $this->faker->randomFloat(),
            '325712X976X32532time' => $this->faker->randomFloat(),
            '325712X979time' => $this->faker->randomFloat(),
            '325712X979X32533time' => $this->faker->randomFloat(),
            '325712X979X32544time' => $this->faker->randomFloat(),
            '325712X979X32557time' => $this->faker->randomFloat(),
            '325712X979X32579time' => $this->faker->randomFloat(),
            '325712X979X32590time' => $this->faker->randomFloat(),
            '325712X979X32601time' => $this->faker->randomFloat(),
            '325712X979X32613time' => $this->faker->randomFloat(),
            '325712X979X32624time' => $this->faker->randomFloat(),
            '325712X979X32635time' => $this->faker->randomFloat(),
            '325712X979X32646time' => $this->faker->randomFloat(),
            '325712X979X32657time' => $this->faker->randomFloat(),
            '325712X980time' => $this->faker->randomFloat(),
            '325712X980X32658time' => $this->faker->randomFloat(),
            '325712X980X32659time' => $this->faker->randomFloat(),
            '325712X980X32660time' => $this->faker->randomFloat(),
            '325712X980X32661time' => $this->faker->randomFloat(),
            '325712X980X32668time' => $this->faker->randomFloat(),
            '325712X977time' => $this->faker->randomFloat(),
            '325712X977X32474time' => $this->faker->randomFloat(),
            '325712X977X32476time' => $this->faker->randomFloat(),
            '325712X977X32477time' => $this->faker->randomFloat(),
            '325712X977X32479time' => $this->faker->randomFloat(),
            '325712X977X32480time' => $this->faker->randomFloat(),
        ];
    }
}
