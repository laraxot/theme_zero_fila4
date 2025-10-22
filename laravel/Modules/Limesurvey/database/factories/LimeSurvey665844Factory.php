<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeSurvey665844;

class LimeSurvey665844Factory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeSurvey665844::class;

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
            '665844X907X31547' => $this->faker->text,
            '665844X907X31548' => $this->faker->text,
            '665844X907X31549' => $this->faker->word,
            '665844X907X31569' => $this->faker->text,
            '665844X908X31550' => $this->faker->word,
            '665844X908X315511' => $this->faker->word,
            '665844X908X315512' => $this->faker->word,
            '665844X908X31552' => $this->faker->word,
            '665844X908X315531' => $this->faker->word,
            '665844X908X315532' => $this->faker->word,
            '665844X908X31554' => $this->faker->word,
            '665844X908X315551' => $this->faker->word,
            '665844X908X315552' => $this->faker->word,
            '665844X908X31572' => $this->faker->word,
            '665844X908X315731' => $this->faker->word,
            '665844X908X315732' => $this->faker->word,
            '665844X909X31556' => $this->faker->word,
            '665844X909X315571' => $this->faker->word,
            '665844X909X315572' => $this->faker->word,
            '665844X909X315573' => $this->faker->word,
            '665844X909X31558' => $this->faker->word,
            '665844X909X315591' => $this->faker->word,
            '665844X909X315592' => $this->faker->word,
            '665844X909X31560' => $this->faker->word,
            '665844X909X315611' => $this->faker->word,
            '665844X909X315612' => $this->faker->word,
            '665844X909X315613' => $this->faker->word,
            '665844X909X315614' => $this->faker->word,
            '665844X909X31562' => $this->faker->word,
            '665844X909X315631' => $this->faker->word,
            '665844X909X315632' => $this->faker->word,
            '665844X909X315633' => $this->faker->word,
            '665844X910X31564' => $this->faker->word,
            '665844X910X315651' => $this->faker->word,
            '665844X910X315652' => $this->faker->word,
            '665844X910X315653' => $this->faker->word,
            '665844X910X315654' => $this->faker->word,
            '665844X910X31566' => $this->faker->word,
            '665844X910X315671' => $this->faker->word,
            '665844X910X315672' => $this->faker->word,
            '665844X910X31574' => $this->faker->word,
            '665844X910X315751' => $this->faker->word,
            '665844X910X315752' => $this->faker->word,
            '665844X910X315753' => $this->faker->word,
            '665844X910X315754' => $this->faker->word,
            '665844X910X31576' => $this->faker->word,
            '665844X910X315771' => $this->faker->word,
            '665844X910X315772' => $this->faker->word,
            '665844X910X315773' => $this->faker->word,
            '665844X911X31570' => $this->faker->text,
            '665844X911X31571' => $this->faker->text,
            '665844X911X31568' => $this->faker->text,
        ];
    }
}
