<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeBox;

class LimeBoxFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeBox::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'position' => $this->faker->randomNumber(5, false),
            'url' => $this->faker->url,
            'title' => $this->faker->sentence,
            'ico' => $this->faker->word,
            'desc' => $this->faker->text,
            'page' => $this->faker->text,
            'usergroup' => $this->faker->randomNumber(5, false),
        ];
    }
}
