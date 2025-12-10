<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeParticipant;

class LimeParticipantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeParticipant::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'email' => $this->faker->email,
            'language' => $this->faker->word,
            'blacklisted' => $this->faker->word,
            'owner_uid' => $this->faker->randomNumber(5, false),
            'created_by' => $this->faker->randomNumber(5, false),
            'created' => $this->faker->dateTime,
            'modified' => $this->faker->dateTime,
        ];
    }
}
