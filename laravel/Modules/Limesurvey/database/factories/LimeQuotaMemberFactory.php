<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeQuotaMember;

class LimeQuotaMemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeQuotaMember::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'sid' => $this->faker->randomNumber(5, false),
            'qid' => $this->faker->randomNumber(5, false),
            'quota_id' => $this->faker->randomNumber(5, false),
            'code' => $this->faker->word,
        ];
    }
}
