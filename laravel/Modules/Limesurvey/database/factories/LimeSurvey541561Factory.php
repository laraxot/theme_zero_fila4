<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeSurvey541561;

class LimeSurvey541561Factory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeSurvey541561::class;

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
            '541561X1003X33065' => $this->faker->randomFloat(),
            '541561X1003X32948' => $this->faker->word,
            '541561X1003X32949' => $this->faker->word,
            '541561X1003X32950' => $this->faker->word,
            '541561X1003X32951' => $this->faker->text,
            '541561X1003X329551' => $this->faker->word,
            '541561X1003X329552' => $this->faker->word,
            '541561X1003X32957' => $this->faker->word,
            '541561X1003X32957other' => $this->faker->text,
            '541561X1003X33000' => $this->faker->text,
            '541561X1003X329581' => $this->faker->word,
            '541561X1003X329582' => $this->faker->word,
            '541561X1003X329583' => $this->faker->word,
            '541561X1003X33004' => $this->faker->word,
            '541561X1003X33005' => $this->faker->text,
            '541561X1003X32973' => $this->faker->text,
            '541561X1003X32946' => $this->faker->text,
            '541561X1003X32947' => $this->faker->word,
            '541561X1003X32947other' => $this->faker->text,
        ];
    }
}
