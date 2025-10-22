<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeMapTutorialUser;

class LimeMapTutorialUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeMapTutorialUser::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'uid' => $this->faker->randomNumber(5, false),
            'taken' => $this->faker->randomNumber(5, false),
        ];
    }
}
