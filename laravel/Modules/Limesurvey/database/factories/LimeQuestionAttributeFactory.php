<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeQuestionAttribute;

class LimeQuestionAttributeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeQuestionAttribute::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'qid' => $this->faker->randomNumber(5, false),
            'attribute' => $this->faker->word,
            'value' => $this->faker->text,
            'language' => $this->faker->word,
        ];
    }
}
