<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeSurvey196427;

class LimeSurvey196427Factory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeSurvey196427::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'token' => $this->faker->word,
            'submitdate' => $this->faker->dateTime,
            'lastpage' => $this->faker->randomNumber(5, false),
            'startlanguage' => $this->faker->word,
            'seed' => $this->faker->seed,
            'startdate' => $this->faker->dateTime,
            'datestamp' => $this->faker->dateTime,
            'ipaddr' => $this->faker->text,
            'refurl' => $this->faker->text,
            '196427X1028X33144' => $this->faker->word,
            '196427X1028X33152' => $this->faker->word,
            '196427X1028X33145' => $this->faker->word,
            '196427X1028X33146' => $this->faker->word,
            '196427X1028X33147' => $this->faker->word,
            '196427X1028X33148' => $this->faker->word,
            '196427X1028X33149' => $this->faker->word,
            '196427X1028X33150' => $this->faker->word,
            '196427X1028X33151' => $this->faker->text,
        ];
    }
}
