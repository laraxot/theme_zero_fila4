<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeTokens594635;

class LimeTokens594635Factory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeTokens594635::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'tid' => $this->faker->randomNumber(5, false),
            'participant_id' => $this->faker->randomNumber(5, false),
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'email' => $this->faker->email,
            'emailstatus' => $this->faker->text,
            'token' => $this->faker->word,
            'language' => $this->faker->word,
            'blacklisted' => $this->faker->word,
            'sent' => $this->faker->word,
            'remindersent' => $this->faker->word,
            'remindercount' => $this->faker->randomNumber(5, false),
            'completed' => $this->faker->word,
            'usesleft' => $this->faker->randomNumber(5, false),
            'validfrom' => $this->faker->dateTime,
            'validuntil' => $this->faker->dateTime,
            'mpid' => $this->faker->randomNumber(5, false),
            'attribute_1' => $this->faker->text,
            'attribute_2' => $this->faker->text,
            'attribute_3' => $this->faker->text,
            'attribute_4' => $this->faker->text,
            'attribute_5' => $this->faker->text,
            'attribute_6' => $this->faker->text,
            'attribute_7' => $this->faker->text,
            'attribute_8' => $this->faker->text,
            'attribute_9' => $this->faker->text,
            'attribute_10' => $this->faker->text,
            'attribute_11' => $this->faker->text,
            'attribute_12' => $this->faker->text,
            'attribute_13' => $this->faker->text,
            'attribute_14' => $this->faker->text,
        ];
    }
}
