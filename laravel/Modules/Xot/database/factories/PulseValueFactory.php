<?php

declare(strict_types=1);

namespace Modules\Xot\Database\Factories;

use Modules\Xot\Models\PulseValue;
use Illuminate\Database\Eloquent\Factories\Factory;

class PulseValueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = PulseValue::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
