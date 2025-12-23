<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeSurvey684277;

class LimeSurvey684277Factory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeSurvey684277::class;

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
            '684277X1118X33850001' => $this->faker->word,
            '684277X1118X33850002' => $this->faker->word,
            '684277X1118X33850003' => $this->faker->word,
            '684277X1118X33850004' => $this->faker->word,
            '684277X1118X33850005' => $this->faker->word,
            '684277X1118X33850006' => $this->faker->word,
            '684277X1118X33850007' => $this->faker->word,
            '684277X1118X33850other' => $this->faker->text,
            '684277X1118X33859' => $this->faker->word,
            '684277X1118X33859other' => $this->faker->text,
            '684277X1118X33868' => $this->faker->word,
            '684277X1118X33868other' => $this->faker->text,
            '684277X1119X33869' => $this->faker->word,
            '684277X1119X33870' => $this->faker->word,
            '684277X1119X33871' => $this->faker->word,
            '684277X1120X33872' => $this->faker->word,
            '684277X1120X33873' => $this->faker->word,
            '684277X1120X33874' => $this->faker->word,
            '684277X1120X33875' => $this->faker->text,
            '684277X1120X33876' => $this->faker->word,
            '684277X1121X33877' => $this->faker->word,
            '684277X1121X33878' => $this->faker->text,
            '684277X1121X33879' => $this->faker->word,
            '684277X1121X33880' => $this->faker->text,
            '684277X1121X33881' => $this->faker->word,
            '684277X1121X33882' => $this->faker->text,
            '684277X1121X33883' => $this->faker->word,
            '684277X1121X33884' => $this->faker->text,
            '684277X1122X33885' => $this->faker->word,
            '684277X1122X33886' => $this->faker->word,
            '684277X1122X33887' => $this->faker->word,
            '684277X1122X33888' => $this->faker->word,
            '684277X1122X33889' => $this->faker->word,
            '684277X1122X33890' => $this->faker->word,
            '684277X1122X33891' => $this->faker->word,
            '684277X1122X33892' => $this->faker->word,
            '684277X1122X33893' => $this->faker->word,
            '684277X1122X33894' => $this->faker->text,
            '684277X1122X33898SQ001' => $this->faker->word,
            '684277X1122X33897' => $this->faker->text,
            '684277X1123X33895' => $this->faker->word,
            '684277X1123X33896' => $this->faker->word,
        ];
    }
}
