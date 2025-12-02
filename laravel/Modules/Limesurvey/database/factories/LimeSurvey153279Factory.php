<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeSurvey153279;

class LimeSurvey153279Factory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeSurvey153279::class;

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
            '153279X923X317651' => $this->faker->word,
            '153279X923X317652' => $this->faker->word,
            '153279X923X317653' => $this->faker->word,
            '153279X923X317654' => $this->faker->word,
            '153279X923X317655' => $this->faker->word,
            '153279X923X317656' => $this->faker->word,
            '153279X923X317657' => $this->faker->word,
            '153279X924X31774Q08' => $this->faker->word,
            '153279X925X317759' => $this->faker->word,
            '153279X925X3177510' => $this->faker->word,
            '153279X925X3177511' => $this->faker->word,
            '153279X926X3178112' => $this->faker->word,
            '153279X926X3178113' => $this->faker->word,
            '153279X927X31788' => $this->faker->word,
            '153279X927X31789' => $this->faker->text,
            '153279X927X31790' => $this->faker->text,
            '153279X928X31791' => $this->faker->word,
            '153279X928X31792' => $this->faker->text,
            '153279X928X31793' => $this->faker->text,
            '153279X929X31794' => $this->faker->word,
            '153279X929X31795' => $this->faker->text,
            '153279X929X31796' => $this->faker->text,
            '153279X929X317971' => $this->faker->word,
            '153279X929X317972' => $this->faker->word,
            '153279X929X317973' => $this->faker->word,
            '153279X929X317974' => $this->faker->word,
            '153279X929X317975' => $this->faker->word,
            '153279X929X317976' => $this->faker->word,
            '153279X929X317977' => $this->faker->word,
            '153279X929X317978' => $this->faker->word,
            '153279X929X317979' => $this->faker->word,
            '153279X929X31797other' => $this->faker->text,
            '153279X929X31808Q23' => $this->faker->word,
            '153279X930X31821' => $this->faker->text,
        ];
    }
}
