<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeSurvey422747Timings;

class LimeSurvey422747TimingsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeSurvey422747Timings::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'interviewtime' => $this->faker->randomFloat(),
            '422747X941time' => $this->faker->randomFloat(),
            '422747X941X32056time' => $this->faker->randomFloat(),
            '422747X941X32033time' => $this->faker->randomFloat(),
            '422747X941X32034time' => $this->faker->randomFloat(),
            '422747X941X32035time' => $this->faker->randomFloat(),
            '422747X942time' => $this->faker->randomFloat(),
            '422747X942X32036time' => $this->faker->randomFloat(),
            '422747X942X32042time' => $this->faker->randomFloat(),
            '422747X942X32043time' => $this->faker->randomFloat(),
            '422747X942X32044time' => $this->faker->randomFloat(),
            '422747X942X32045time' => $this->faker->randomFloat(),
            '422747X942X32046time' => $this->faker->randomFloat(),
            '422747X943time' => $this->faker->randomFloat(),
            '422747X943X32037time' => $this->faker->randomFloat(),
            '422747X943X32047time' => $this->faker->randomFloat(),
            '422747X943X32048time' => $this->faker->randomFloat(),
            '422747X943X32049time' => $this->faker->randomFloat(),
            '422747X944time' => $this->faker->randomFloat(),
            '422747X944X32038time' => $this->faker->randomFloat(),
            '422747X944X32039time' => $this->faker->randomFloat(),
            '422747X944X32040time' => $this->faker->randomFloat(),
            '422747X944X32041time' => $this->faker->randomFloat(),
            '422747X944X32052time' => $this->faker->randomFloat(),
            '422747X944X32050time' => $this->faker->randomFloat(),
            '422747X945time' => $this->faker->randomFloat(),
            '422747X945X32051time' => $this->faker->randomFloat(),
            '422747X945X32053time' => $this->faker->randomFloat(),
            '422747X945X32054time' => $this->faker->randomFloat(),
            '422747X945X32055time' => $this->faker->randomFloat(),
            '422747X945X32057time' => $this->faker->randomFloat(),
            '422747X945X32058time' => $this->faker->randomFloat(),
        ];
    }
}
