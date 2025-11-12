<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeGroup;

class LimeGroupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeGroup::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'language' => $this->faker->word,
            'sid' => $this->faker->randomNumber(5, false),
            'group_name' => $this->faker->word,
            'group_order' => $this->faker->randomNumber(5, false),
            'description' => $this->faker->text,
            'randomization_group' => $this->faker->word,
            'grelevance' => $this->faker->text,
        ];
    }
}
