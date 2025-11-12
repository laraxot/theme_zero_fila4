<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeLabel;

class LimeLabelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeLabel::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'lid' => $this->faker->randomNumber(5, false),
            'code' => $this->faker->word,
            'title' => $this->faker->sentence,
            'sortorder' => $this->faker->randomNumber(5, false),
            'language' => $this->faker->word,
            'assessment_value' => $this->faker->randomNumber(5, false),
        ];
    }
}
