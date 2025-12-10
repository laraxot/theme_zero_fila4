<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeQuestion;

class LimeQuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeQuestion::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'language' => $this->faker->word,
            'parent_qid' => $this->faker->randomNumber(5, false),
            'sid' => $this->faker->randomNumber(5, false),
            'gid' => $this->faker->randomNumber(5, false),
            'type' => $this->faker->word,
            'title' => $this->faker->sentence,
            'question' => $this->faker->text,
            'preg' => $this->faker->text,
            'help' => $this->faker->text,
            'other' => $this->faker->word,
            'mandatory' => $this->faker->word,
            'question_order' => $this->faker->randomNumber(5, false),
            'scale_id' => $this->faker->randomNumber(5, false),
            'same_default' => $this->faker->randomNumber(5, false),
            'relevance' => $this->faker->text,
            'modulename' => $this->faker->word,
        ];
    }
}
