<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Modules\User\Models\SocialProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

class SocialProviderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = SocialProvider::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
