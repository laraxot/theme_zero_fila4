<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeSurvey176817;

class LimeSurvey176817Factory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeSurvey176817::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'token' => $this->faker->word,
            'submitdate' => $this->faker->dateTime,
            'lastpage' => $this->faker->randomNumber(5, false),
            'startlanguage' => $this->faker->word,
            'seed' => $this->faker->seed,
            'startdate' => $this->faker->dateTime,
            'datestamp' => $this->faker->dateTime,
            'ipaddr' => $this->faker->text,
            '176817X795X30223' => $this->faker->word,
            '176817X794X30215' => $this->faker->word,
            '176817X794X30216' => $this->faker->text,
            '176817X794X30217' => $this->faker->word,
            '176817X794X30218' => $this->faker->text,
            '176817X794X30219' => $this->faker->word,
            '176817X794X30220' => $this->faker->word,
            '176817X794X30221' => $this->faker->text,
            '176817X794X30222SQ001' => $this->faker->word,
            '176817X794X30222SQ002' => $this->faker->word,
            '176817X794X30222SQ003' => $this->faker->word,
            '176817X794X30222SQ004' => $this->faker->word,
            '176817X794X30224' => $this->faker->word,
        ];
    }
}
