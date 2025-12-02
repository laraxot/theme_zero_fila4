<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeSurvey628829;

class LimeSurvey628829Factory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeSurvey628829::class;

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
            '628829X1070X33470' => $this->faker->word,
            '628829X1070X33471' => $this->faker->word,
            '628829X1065X33488' => $this->faker->word,
            '628829X1065X33489' => $this->faker->word,
            '628829X1065X33489other' => $this->faker->text,
            '628829X1065X33398' => $this->faker->word,
            '628829X1065X33399' => $this->faker->word,
            '628829X1065X33400' => $this->faker->word,
            '628829X1065X33401' => $this->faker->word,
            '628829X1065X33474' => $this->faker->word,
            '628829X1065X33473' => $this->faker->word,
            '628829X1066X33490' => $this->faker->word,
            '628829X1066X33465' => $this->faker->word,
            '628829X1066X33426' => $this->faker->word,
            '628829X1066X33448' => $this->faker->word,
            '628829X1066X33449' => $this->faker->word,
            '628829X1066X33456' => $this->faker->word,
            '628829X1066X33457' => $this->faker->word,
            '628829X1067X33466' => $this->faker->word,
            '628829X1068X33404' => $this->faker->word,
            '628829X1068X33405' => $this->faker->word,
            '628829X1068X33406' => $this->faker->word,
            '628829X1068X33406other' => $this->faker->text,
            '628829X1069X33467' => $this->faker->word,
            '628829X1069X33467other' => $this->faker->text,
            '628829X1069X33468' => $this->faker->dateTime,
            '628829X1069X33469' => $this->faker->word,
            '628829X1069X33469other' => $this->faker->text,
            '628829X1069X33472' => $this->faker->word,
            '628829X1069X33472other' => $this->faker->text,
        ];
    }
}
