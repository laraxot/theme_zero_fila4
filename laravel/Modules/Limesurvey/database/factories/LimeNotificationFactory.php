<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeNotification;

class LimeNotificationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeNotification::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'entity' => $this->faker->word,
            'entity_id' => $this->faker->randomNumber(5, false),
            'title' => $this->faker->sentence,
            'message' => $this->faker->text,
            'status' => $this->faker->word,
            'importance' => $this->faker->randomNumber(5, false),
            'display_class' => $this->faker->word,
            'hash' => $this->faker->word,
            'created' => $this->faker->dateTime,
            'first_read' => $this->faker->dateTime,
        ];
    }
}
