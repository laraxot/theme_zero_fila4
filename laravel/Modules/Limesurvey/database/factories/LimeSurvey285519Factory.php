<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeSurvey285519;

class LimeSurvey285519Factory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeSurvey285519::class;

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
            '285519X1033X33181' => $this->faker->word,
            '285519X1033X33182' => $this->faker->word,
            '285519X1033X33182other' => $this->faker->text,
            '285519X1033X33183' => $this->faker->word,
            '285519X1034X331844#0' => $this->faker->word,
            '285519X1034X331844#1' => $this->faker->word,
            '285519X1034X331845#0' => $this->faker->word,
            '285519X1034X331845#1' => $this->faker->word,
            '285519X1034X331846#0' => $this->faker->word,
            '285519X1034X331846#1' => $this->faker->word,
            '285519X1034X331847#0' => $this->faker->word,
            '285519X1034X331847#1' => $this->faker->word,
            '285519X1034X331848#0' => $this->faker->word,
            '285519X1034X331848#1' => $this->faker->word,
            '285519X1034X331849#0' => $this->faker->word,
            '285519X1034X331849#1' => $this->faker->word,
            '285519X1034X3318410#0' => $this->faker->word,
            '285519X1034X3318410#1' => $this->faker->word,
            '285519X1034X3318411#0' => $this->faker->word,
            '285519X1034X3318411#1' => $this->faker->word,
            '285519X1034X3318412#0' => $this->faker->word,
            '285519X1034X3318412#1' => $this->faker->word,
            '285519X1034X3318413#0' => $this->faker->word,
            '285519X1034X3318413#1' => $this->faker->word,
            '285519X1034X3318414#0' => $this->faker->word,
            '285519X1034X3318414#1' => $this->faker->word,
            '285519X1034X3318415#0' => $this->faker->word,
            '285519X1034X3318415#1' => $this->faker->word,
            '285519X1034X3318416#0' => $this->faker->word,
            '285519X1034X3318416#1' => $this->faker->word,
            '285519X1034X3318417#0' => $this->faker->word,
            '285519X1034X3318417#1' => $this->faker->word,
            '285519X1034X3318418#0' => $this->faker->word,
            '285519X1034X3318418#1' => $this->faker->word,
            '285519X1034X3318419#0' => $this->faker->word,
            '285519X1034X3318419#1' => $this->faker->word,
            '285519X1035X33185' => $this->faker->word,
            '285519X1035X33186' => $this->faker->text,
            '285519X1036X33187' => $this->faker->word,
            '285519X1036X33188' => $this->faker->word,
            '285519X1036X33189' => $this->faker->word,
            '285519X1036X33189other' => $this->faker->text,
            '285519X1036X33190' => $this->faker->word,
            '285519X1036X33191' => $this->faker->word,
            '285519X1036X33192' => $this->faker->word,
        ];
    }
}
