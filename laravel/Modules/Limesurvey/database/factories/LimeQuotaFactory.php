<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeQuota;

class LimeQuotaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeQuota::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'sid' => $this->faker->randomNumber(5, false),
            'name' => $this->faker->name,
            'qlimit' => $this->faker->randomNumber(5, false),
            'action' => $this->faker->randomNumber(5, false),
            'active' => $this->faker->randomNumber(5, false),
            'autoload_url' => $this->faker->randomNumber(5, false),
        ];
    }
}
