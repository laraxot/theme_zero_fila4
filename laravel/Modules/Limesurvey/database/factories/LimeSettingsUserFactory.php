<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeSettingsUser;

class LimeSettingsUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeSettingsUser::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'uid' => $this->faker->randomNumber(5, false),
            'entity' => $this->faker->word,
            'entity_id' => $this->faker->randomNumber(5, false),
            'stg_name' => $this->faker->word,
            'stg_value' => $this->faker->text,
        ];
    }
}
