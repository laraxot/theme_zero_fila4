<?php

declare(strict_types=1);

namespace Modules\Quaeris\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Models\Contact;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->randomNumber(5),
            'survey_pdf_id' => $this->faker->randomNumber(5),
            'mobile_phone' => $this->faker->word,
            'sms_sent_at' => $this->faker->dateTime,
            'sms_count' => $this->faker->randomNumber(5),
            'email' => $this->faker->email,
            'mail_sent_at' => $this->faker->dateTime,
            'mail_count' => $this->faker->randomNumber(5),
            'language' => $this->faker->word,
            'usesleft' => $this->faker->word,
            'token' => $this->faker->word,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'attribute_1' => $this->faker->word,
            'attribute_2' => $this->faker->word,
            'attribute_3' => $this->faker->word,
            'attribute_4' => $this->faker->word,
            'attribute_5' => $this->faker->word,
            'attribute_6' => $this->faker->word,
            'attribute_7' => $this->faker->word,
            'attribute_8' => $this->faker->word,
            'attribute_9' => $this->faker->word,
            'attribute_10' => $this->faker->word,
            'attribute_11' => $this->faker->word,
            'attribute_12' => $this->faker->word,
            'attribute_13' => $this->faker->word,
            'attribute_14' => $this->faker->word,
            'sms_status_code' => $this->faker->word,
            'sms_status_txt' => $this->faker->word,
            'duplicate_count' => $this->faker->randomNumber(5),
            'order_column' => $this->faker->randomNumber(5),
        ];
    }
}
