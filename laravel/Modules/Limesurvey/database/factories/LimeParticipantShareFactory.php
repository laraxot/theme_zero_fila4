<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeParticipantShare;

class LimeParticipantShareFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeParticipantShare::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'share_uid' => $this->faker->randomNumber(5, false),
            'date_added' => $this->faker->dateTime,
            'can_edit' => $this->faker->word,
        ];
    }
}
