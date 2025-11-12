<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeSurvey155327;

class LimeSurvey155327Factory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeSurvey155327::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->randomNumber(5, false),
            'token' => $this->faker->word,
            'submitdate' => $this->faker->dateTime,
            'lastpage' => $this->faker->randomNumber(5, false),
            'startlanguage' => $this->faker->word,
            'seed' => $this->faker->seed,
            'startdate' => $this->faker->dateTime,
            'datestamp' => $this->faker->dateTime,
            'ipaddr' => $this->faker->text,
            'refurl' => $this->faker->text,
            '155327X1500X37858SQ001' => $this->faker->word,
            '155327X1500X37862' => $this->faker->text,
            '155327X1500X37860SQ001' => $this->faker->word,
            '155327X1500X37861SQ001' => $this->faker->word,
            '155327X1500X37866' => $this->faker->text,
            '155327X1500X37946SQ001' => $this->faker->word,
            '155327X1500X37865SQ001' => $this->faker->word,
            '155327X1500X37859' => $this->faker->text,
        ];
    }
}
