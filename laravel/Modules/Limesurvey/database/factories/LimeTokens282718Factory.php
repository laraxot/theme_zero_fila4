<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeTokens282718;

class LimeTokens282718Factory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeTokens282718::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'tid' => $this->faker->randomNumber(5),
            'participant_id' => $this->faker->randomNumber(5),
            'firstname' => $this->faker->firstname,
            'lastname' => $this->faker->lastname,
            'email' => $this->faker->email,
            'emailstatus' => $this->faker->text,
            'token' => $this->faker->word,
            'language' => $this->faker->word,
            'blacklisted' => $this->faker->word,
            'sent' => $this->faker->word,
            'remindersent' => $this->faker->word,
            'remindercount' => $this->faker->randomNumber(5),
            'completed' => $this->faker->word,
            'usesleft' => $this->faker->randomNumber(5),
            'validfrom' => $this->faker->dateTime,
            'validuntil' => $this->faker->dateTime,
            'mpid' => $this->faker->randomNumber(5),
            'attribute_1' => $this->faker->text,
            'attribute_2' => $this->faker->text,
            'attribute_3' => $this->faker->text,
        ];
    }
}
