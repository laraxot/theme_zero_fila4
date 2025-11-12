<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeSurvey726613Timings;

class LimeSurvey726613TimingsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeSurvey726613Timings::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'interviewtime' => $this->faker->randomFloat(),
            '726613X995time' => $this->faker->randomFloat(),
            '726613X995X33066time' => $this->faker->randomFloat(),
            '726613X995X32856time' => $this->faker->randomFloat(),
            '726613X995X32857time' => $this->faker->randomFloat(),
            '726613X995X32858time' => $this->faker->randomFloat(),
            '726613X995X32859time' => $this->faker->randomFloat(),
            '726613X995X32860time' => $this->faker->randomFloat(),
            '726613X995X32861time' => $this->faker->randomFloat(),
            '726613X995X32862time' => $this->faker->randomFloat(),
            '726613X995X32863time' => $this->faker->randomFloat(),
            '726613X995X32871time' => $this->faker->randomFloat(),
            '726613X995X32880time' => $this->faker->randomFloat(),
            '726613X995X32881time' => $this->faker->randomFloat(),
            '726613X995X32890time' => $this->faker->randomFloat(),
            '726613X995X32891time' => $this->faker->randomFloat(),
            '726613X995X32892time' => $this->faker->randomFloat(),
            '726613X995X32893time' => $this->faker->randomFloat(),
            '726613X995X32894time' => $this->faker->randomFloat(),
            '726613X995X32905time' => $this->faker->randomFloat(),
            '726613X995X32915time' => $this->faker->randomFloat(),
            '726613X995X32927time' => $this->faker->randomFloat(),
            '726613X995X32937time' => $this->faker->randomFloat(),
            '726613X995X32938time' => $this->faker->randomFloat(),
            '726613X995X32940time' => $this->faker->randomFloat(),
            '726613X995X32941time' => $this->faker->randomFloat(),
            '726613X995X32942time' => $this->faker->randomFloat(),
            '726613X995X32943time' => $this->faker->randomFloat(),
            '726613X995X32944time' => $this->faker->randomFloat(),
            '726613X995X32945time' => $this->faker->randomFloat(),
            '726613X995X32833time' => $this->faker->randomFloat(),
            '726613X995X32834time' => $this->faker->randomFloat(),
        ];
    }
}
