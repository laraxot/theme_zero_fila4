<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeSurvey299355;

class LimeSurvey299355Factory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeSurvey299355::class;

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
            '299355X1029X33153' => $this->faker->word,
            '299355X1029X33154' => $this->faker->word,
            '299355X1029X33154other' => $this->faker->text,
            '299355X1029X33155' => $this->faker->word,
            '299355X1030X331564#0' => $this->faker->word,
            '299355X1030X331564#1' => $this->faker->word,
            '299355X1030X331565#0' => $this->faker->word,
            '299355X1030X331565#1' => $this->faker->word,
            '299355X1030X331566#0' => $this->faker->word,
            '299355X1030X331566#1' => $this->faker->word,
            '299355X1030X331567#0' => $this->faker->word,
            '299355X1030X331567#1' => $this->faker->word,
            '299355X1030X331568#0' => $this->faker->word,
            '299355X1030X331568#1' => $this->faker->word,
            '299355X1030X331569#0' => $this->faker->word,
            '299355X1030X331569#1' => $this->faker->word,
            '299355X1030X3315610#0' => $this->faker->word,
            '299355X1030X3315610#1' => $this->faker->word,
            '299355X1030X3315611#0' => $this->faker->word,
            '299355X1030X3315611#1' => $this->faker->word,
            '299355X1030X3315612#0' => $this->faker->word,
            '299355X1030X3315612#1' => $this->faker->word,
            '299355X1030X3315613#0' => $this->faker->word,
            '299355X1030X3315613#1' => $this->faker->word,
            '299355X1030X3315614#0' => $this->faker->word,
            '299355X1030X3315614#1' => $this->faker->word,
            '299355X1030X3315615#0' => $this->faker->word,
            '299355X1030X3315615#1' => $this->faker->word,
            '299355X1030X3315616#0' => $this->faker->word,
            '299355X1030X3315616#1' => $this->faker->word,
            '299355X1030X3315617#0' => $this->faker->word,
            '299355X1030X3315617#1' => $this->faker->word,
            '299355X1030X3315618#0' => $this->faker->word,
            '299355X1030X3315618#1' => $this->faker->word,
            '299355X1030X3315619#0' => $this->faker->word,
            '299355X1030X3315619#1' => $this->faker->word,
            '299355X1031X33157' => $this->faker->word,
            '299355X1031X33158' => $this->faker->text,
            '299355X1032X33159' => $this->faker->word,
            '299355X1032X33160' => $this->faker->word,
            '299355X1032X33161' => $this->faker->word,
            '299355X1032X33161other' => $this->faker->text,
            '299355X1032X33162' => $this->faker->word,
            '299355X1032X33163' => $this->faker->word,
            '299355X1032X33164' => $this->faker->word,
        ];
    }
}
