<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeAnswer;

class LimeAnswerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeAnswer::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'qid' => $this->faker->randomNumber(5, false),
            'code' => $this->faker->word,
            'sortorder' => $this->faker->randomNumber(5, false),
            'assessment_value' => $this->faker->randomNumber(5, false),
            'scale_id' => $this->faker->randomNumber(5, false),
        ];
    }
}
