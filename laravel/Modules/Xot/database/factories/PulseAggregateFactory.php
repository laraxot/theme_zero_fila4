<?php

declare(strict_types=1);

namespace Modules\Xot\Database\Factories;

use Modules\Xot\Models\PulseAggregate;
use Illuminate\Database\Eloquent\Factories\Factory;

class PulseAggregateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = PulseAggregate::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
