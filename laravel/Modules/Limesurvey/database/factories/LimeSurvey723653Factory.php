<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeSurvey723653;

class LimeSurvey723653Factory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeSurvey723653::class;

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
            '723653X434X26682' => $this->faker->word,
            '723653X434X26683' => $this->faker->word,
            '723653X435X26727' => $this->faker->word,
            '723653X435X26684' => $this->faker->word,
            '723653X435X26685' => $this->faker->text,
            '723653X435X26686' => $this->faker->word,
            '723653X435X26687' => $this->faker->text,
            '723653X435X26688' => $this->faker->word,
            '723653X435X26689' => $this->faker->text,
            '723653X435X26690' => $this->faker->word,
            '723653X435X26691' => $this->faker->text,
            '723653X435X26692SQ001' => $this->faker->word,
            '723653X435X26693' => $this->faker->text,
            '723653X436X26728' => $this->faker->word,
            '723653X436X26694' => $this->faker->word,
            '723653X436X26695' => $this->faker->text,
            '723653X436X26696' => $this->faker->word,
            '723653X436X26697' => $this->faker->text,
            '723653X436X26698' => $this->faker->word,
            '723653X436X26699' => $this->faker->text,
            '723653X436X26700SQ001' => $this->faker->word,
            '723653X436X26701' => $this->faker->text,
            '723653X436X26702SQ001' => $this->faker->word,
            '723653X436X26703' => $this->faker->text,
            '723653X437X26729' => $this->faker->word,
            '723653X437X26704' => $this->faker->word,
            '723653X437X26732SQ001' => $this->faker->word,
            '723653X437X26733' => $this->faker->text,
            '723653X437X26705' => $this->faker->randomFloat(),
            '723653X437X26710' => $this->faker->word,
            '723653X437X26706' => $this->faker->word,
            '723653X437X26707' => $this->faker->text,
            '723653X437X26711' => $this->faker->word,
            '723653X437X26712' => $this->faker->text,
            '723653X437X26713' => $this->faker->word,
            '723653X437X26714' => $this->faker->text,
            '723653X437X26708SQ001' => $this->faker->word,
            '723653X437X26709' => $this->faker->text,
            '723653X438X26715' => $this->faker->word,
            '723653X438X26716' => $this->faker->word,
            '723653X438X26716other' => $this->faker->text,
            '723653X438X26717' => $this->faker->word,
            '723653X438X26718SQ001' => $this->faker->word,
            '723653X438X26719' => $this->faker->text,
            '723653X439X26724' => $this->faker->word,
            '723653X439X26720SQ001' => $this->faker->word,
            '723653X439X26721' => $this->faker->text,
            '723653X439X26725SQ001' => $this->faker->word,
            '723653X439X26726' => $this->faker->text,
            '723653X439X26722SQ001' => $this->faker->word,
            '723653X439X26723' => $this->faker->text,
            '723653X440X26731' => $this->faker->word,
            '723653X440X26730' => $this->faker->word,
        ];
    }
}
