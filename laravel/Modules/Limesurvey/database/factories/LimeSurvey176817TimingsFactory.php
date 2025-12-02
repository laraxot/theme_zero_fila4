<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeSurvey176817Timings;

class LimeSurvey176817TimingsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeSurvey176817Timings::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'interviewtime' => $this->faker->randomFloat(),
            '176817X795time' => $this->faker->randomFloat(),
            '176817X795X30223time' => $this->faker->randomFloat(),
            '176817X794time' => $this->faker->randomFloat(),
            '176817X794X30215time' => $this->faker->randomFloat(),
            '176817X794X30216time' => $this->faker->randomFloat(),
            '176817X794X30217time' => $this->faker->randomFloat(),
            '176817X794X30218time' => $this->faker->randomFloat(),
            '176817X794X30219time' => $this->faker->randomFloat(),
            '176817X794X30220time' => $this->faker->randomFloat(),
            '176817X794X30221time' => $this->faker->randomFloat(),
            '176817X794X30222time' => $this->faker->randomFloat(),
            '176817X794X30224time' => $this->faker->randomFloat(),
        ];
    }
}
