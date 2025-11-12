<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeParticipantAttributeName;

class LimeParticipantAttributeNameFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeParticipantAttributeName::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'attribute_type' => $this->faker->word,
            'defaultname' => $this->faker->word,
            'visible' => $this->faker->word,
        ];
    }
}
