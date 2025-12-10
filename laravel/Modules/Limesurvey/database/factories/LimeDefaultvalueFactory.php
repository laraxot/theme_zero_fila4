<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeDefaultvalue;

class LimeDefaultvalueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeDefaultvalue::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'scale_id' => $this->faker->randomNumber(5, false),
            'sqid' => $this->faker->randomNumber(5, false),
            'language' => $this->faker->word,
            'specialtype' => $this->faker->word,
            'defaultvalue' => $this->faker->text,
        ];
    }
}
