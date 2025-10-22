<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeCondition;

class LimeConditionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeCondition::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'qid' => $this->faker->randomNumber(5, false),
            'cqid' => $this->faker->randomNumber(5, false),
            'cfieldname' => $this->faker->word,
            'method' => $this->faker->word,
            'value' => $this->faker->word,
            'scenario' => $this->faker->randomNumber(5, false),
        ];
    }
}
