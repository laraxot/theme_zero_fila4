<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeExpressionError;

class LimeExpressionErrorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeExpressionError::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'errortime' => $this->faker->word,
            'sid' => $this->faker->randomNumber(5, false),
            'gid' => $this->faker->randomNumber(5, false),
            'qid' => $this->faker->randomNumber(5, false),
            'gseq' => $this->faker->randomNumber(5, false),
            'qseq' => $this->faker->randomNumber(5, false),
            'type' => $this->faker->word,
            'eqn' => $this->faker->text,
            'prettyprint' => $this->faker->text,
        ];
    }
}
