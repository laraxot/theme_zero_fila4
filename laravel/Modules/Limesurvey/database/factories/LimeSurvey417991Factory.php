<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeSurvey417991;

class LimeSurvey417991Factory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeSurvey417991::class;

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
            '417991X1025X33130' => $this->faker->text,
            '417991X1026X331312' => $this->faker->word,
            '417991X1026X331313' => $this->faker->word,
            '417991X1026X331314' => $this->faker->word,
            '417991X1026X331315' => $this->faker->word,
            '417991X1026X331316' => $this->faker->word,
            '417991X1026X331317' => $this->faker->word,
            '417991X1026X331318' => $this->faker->word,
            '417991X1026X331319' => $this->faker->word,
            '417991X1026X3314110' => $this->faker->word,
            '417991X1027X33143' => $this->faker->text,
        ];
    }
}
