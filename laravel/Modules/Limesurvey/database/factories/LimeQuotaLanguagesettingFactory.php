<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeQuotaLanguagesetting;

class LimeQuotaLanguagesettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeQuotaLanguagesetting::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'quotals_quota_id' => $this->faker->randomNumber(5, false),
            'quotals_language' => $this->faker->word,
            'quotals_name' => $this->faker->word,
            'quotals_message' => $this->faker->text,
            'quotals_url' => $this->faker->word,
            'quotals_urldescrip' => $this->faker->word,
        ];
    }
}
