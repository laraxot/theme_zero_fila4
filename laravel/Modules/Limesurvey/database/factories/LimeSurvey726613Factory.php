<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeSurvey726613;

class LimeSurvey726613Factory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeSurvey726613::class;

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
            '726613X995X33066' => $this->faker->randomFloat(),
            '726613X995X32856' => $this->faker->word,
            '726613X995X32857' => $this->faker->word,
            '726613X995X32858' => $this->faker->word,
            '726613X995X32859' => $this->faker->text,
            '726613X995X32860' => $this->faker->text,
            '726613X995X32861' => $this->faker->word,
            '726613X995X32862' => $this->faker->randomFloat(),
            '726613X995X328631' => $this->faker->word,
            '726613X995X328632' => $this->faker->word,
            '726613X995X328633' => $this->faker->word,
            '726613X995X328634' => $this->faker->word,
            '726613X995X328635' => $this->faker->word,
            '726613X995X328711' => $this->faker->word,
            '726613X995X328712' => $this->faker->word,
            '726613X995X328713' => $this->faker->word,
            '726613X995X32880' => $this->faker->word,
            '726613X995X3288110' => $this->faker->word,
            '726613X995X3288111' => $this->faker->word,
            '726613X995X32890' => $this->faker->text,
            '726613X995X32891' => $this->faker->text,
            '726613X995X32892' => $this->faker->word,
            '726613X995X32893' => $this->faker->text,
            '726613X995X32894' => $this->faker->randomFloat(),
            '726613X995X3290512' => $this->faker->word,
            '726613X995X3290513' => $this->faker->word,
            '726613X995X3290514' => $this->faker->word,
            '726613X995X3290515' => $this->faker->word,
            '726613X995X3290516' => $this->faker->word,
            '726613X995X3290517' => $this->faker->word,
            '726613X995X3290518' => $this->faker->word,
            '726613X995X3291519' => $this->faker->word,
            '726613X995X3291520' => $this->faker->word,
            '726613X995X3291521' => $this->faker->word,
            '726613X995X3292722' => $this->faker->word,
            '726613X995X32937' => $this->faker->word,
            '726613X995X3293824' => $this->faker->word,
            '726613X995X32940' => $this->faker->word,
            '726613X995X32941' => $this->faker->text,
            '726613X995X32942' => $this->faker->text,
            '726613X995X32943' => $this->faker->word,
            '726613X995X32944' => $this->faker->text,
            '726613X995X32945' => $this->faker->text,
            '726613X995X32833' => $this->faker->text,
            '726613X995X32834' => $this->faker->word,
            '726613X995X32834other' => $this->faker->text,
        ];
    }
}
