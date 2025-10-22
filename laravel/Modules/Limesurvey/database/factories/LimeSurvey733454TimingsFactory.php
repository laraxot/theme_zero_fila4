<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeSurvey733454Timings;

class LimeSurvey733454TimingsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeSurvey733454Timings::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'interviewtime' => $this->faker->randomFloat(),
            '733454X953time' => $this->faker->randomFloat(),
            '733454X953X32199time' => $this->faker->randomFloat(),
            '733454X954time' => $this->faker->randomFloat(),
            '733454X954X32179time' => $this->faker->randomFloat(),
            '733454X954X32180time' => $this->faker->randomFloat(),
            '733454X954X32185time' => $this->faker->randomFloat(),
            '733454X955time' => $this->faker->randomFloat(),
            '733454X955X32186time' => $this->faker->randomFloat(),
            '733454X955X32187time' => $this->faker->randomFloat(),
            '733454X958time' => $this->faker->randomFloat(),
            '733454X958X32188time' => $this->faker->randomFloat(),
            '733454X958X32190time' => $this->faker->randomFloat(),
            '733454X958X32255time' => $this->faker->randomFloat(),
            '733454X956time' => $this->faker->randomFloat(),
            '733454X956X32177time' => $this->faker->randomFloat(),
            '733454X956X32176time' => $this->faker->randomFloat(),
            '733454X956X32178time' => $this->faker->randomFloat(),
            '733454X956X32183time' => $this->faker->randomFloat(),
            '733454X956X32182time' => $this->faker->randomFloat(),
            '733454X956X32181time' => $this->faker->randomFloat(),
            '733454X956X32184time' => $this->faker->randomFloat(),
            '733454X956X32193time' => $this->faker->randomFloat(),
            '733454X957time' => $this->faker->randomFloat(),
            '733454X957X32194time' => $this->faker->randomFloat(),
            '733454X957X32196time' => $this->faker->randomFloat(),
            '733454X957X32197time' => $this->faker->randomFloat(),
            '733454X957X32198time' => $this->faker->randomFloat(),
            '733454X957X32200time' => $this->faker->randomFloat(),
            '733454X957X32201time' => $this->faker->randomFloat(),
        ];
    }
}
