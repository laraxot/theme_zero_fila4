<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeAssessment;

class LimeAssessmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeAssessment::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'language' => $this->faker->word,
            'sid' => $this->faker->randomNumber(5, false),
            'scope' => $this->faker->word,
            'gid' => $this->faker->randomNumber(5, false),
            'name' => $this->faker->name,
            'minimum' => $this->faker->word,
            'maximum' => $this->faker->word,
            'message' => $this->faker->text,
        ];
    }
}
