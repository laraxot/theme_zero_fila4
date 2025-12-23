<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeSavedControl;

class LimeSavedControlFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeSavedControl::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'sid' => $this->faker->randomNumber(5, false),
            'srid' => $this->faker->randomNumber(5, false),
            'identifier' => $this->faker->text,
            'access_code' => $this->faker->text,
            'email' => $this->faker->email,
            'ip' => $this->faker->text,
            'saved_thisstep' => $this->faker->text,
            'status' => $this->faker->word,
            'saved_date' => $this->faker->dateTime,
            'refurl' => $this->faker->text,
        ];
    }
}
