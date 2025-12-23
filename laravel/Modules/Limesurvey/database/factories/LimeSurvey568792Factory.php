<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeSurvey568792;

class LimeSurvey568792Factory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeSurvey568792::class;

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
            '568792X987X32761' => $this->faker->word,
            '568792X988X32785' => $this->faker->text,
            '568792X989X327452_01' => $this->faker->text,
            '568792X989X327452_02' => $this->faker->text,
            '568792X989X327453_01' => $this->faker->text,
            '568792X989X327453_02' => $this->faker->text,
            '568792X989X327454_01' => $this->faker->text,
            '568792X989X327454_02' => $this->faker->text,
            '568792X989X327455_01' => $this->faker->text,
            '568792X989X327455_02' => $this->faker->text,
            '568792X989X327456_01' => $this->faker->text,
            '568792X989X327456_02' => $this->faker->text,
            '568792X989X327457_01' => $this->faker->text,
            '568792X989X327457_02' => $this->faker->text,
            '568792X989X327458_01' => $this->faker->text,
            '568792X989X327458_02' => $this->faker->text,
            '568792X989X327459_01' => $this->faker->text,
            '568792X989X327459_02' => $this->faker->text,
            '568792X989X3274510_01' => $this->faker->text,
            '568792X989X3274510_02' => $this->faker->text,
            '568792X989X3274511_01' => $this->faker->text,
            '568792X989X3274511_02' => $this->faker->text,
            '568792X989X3274512_01' => $this->faker->text,
            '568792X989X3274512_02' => $this->faker->text,
            '568792X989X32746' => $this->faker->word,
            '568792X993X32799' => $this->faker->word,
            '568792X993X32800' => $this->faker->word,
            '568792X993X32801' => $this->faker->word,
            '568792X994X32802' => $this->faker->word,
            '568792X994X32803' => $this->faker->word,
            '568792X994X3280418' => $this->faker->word,
            '568792X994X3280419' => $this->faker->word,
            '568792X994X3280420' => $this->faker->word,
            '568792X994X32808' => $this->faker->text,
            '568792X990X32747' => $this->faker->word,
            '568792X990X32809' => $this->faker->word,
            '568792X990X32810' => $this->faker->word,
            '568792X990X32811' => $this->faker->word,
            '568792X990X32812' => $this->faker->word,
            '568792X991X32759' => $this->faker->dateTime,
            '568792X991X32760' => $this->faker->dateTime,
            '568792X991X32762' => $this->faker->text,
            '568792X991X32763' => $this->faker->word,
            '568792X991X32763other' => $this->faker->text,
        ];
    }
}
