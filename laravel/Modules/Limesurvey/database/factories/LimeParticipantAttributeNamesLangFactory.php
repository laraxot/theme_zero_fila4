<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeParticipantAttributeNamesLang;

class LimeParticipantAttributeNamesLangFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeParticipantAttributeNamesLang::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'lang' => $this->faker->word,
            'attribute_name' => $this->faker->word,
        ];
    }
}
