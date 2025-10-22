<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeSurvey39275;

class LimeSurvey39275Factory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeSurvey39275::class;

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
            '39275X39X465' => $this->faker->word,
            '39275X39X466' => $this->faker->word,
            '39275X40X539' => $this->faker->word,
            '39275X40X467' => $this->faker->word,
            '39275X40X468' => $this->faker->text,
            '39275X40X469' => $this->faker->word,
            '39275X40X470' => $this->faker->text,
            '39275X40X471' => $this->faker->word,
            '39275X40X472' => $this->faker->text,
            '39275X40X473' => $this->faker->word,
            '39275X40X474' => $this->faker->text,
            '39275X40X475SQ001' => $this->faker->word,
            '39275X40X476' => $this->faker->text,
            '39275X41X540' => $this->faker->word,
            '39275X41X479' => $this->faker->word,
            '39275X41X480' => $this->faker->text,
            '39275X41X481' => $this->faker->word,
            '39275X41X482' => $this->faker->text,
            '39275X41X483' => $this->faker->word,
            '39275X41X484' => $this->faker->text,
            '39275X41X487SQ001' => $this->faker->word,
            '39275X41X488' => $this->faker->text,
            '39275X41X490SQ001' => $this->faker->word,
            '39275X41X492' => $this->faker->text,
            '39275X42X541' => $this->faker->word,
            '39275X42X493' => $this->faker->word,
            '39275X42X660SQ001' => $this->faker->word,
            '39275X42X723' => $this->faker->text,
            '39275X42X495' => $this->faker->randomFloat(),
            '39275X42X505' => $this->faker->word,
            '39275X42X497' => $this->faker->word,
            '39275X42X498' => $this->faker->text,
            '39275X42X506' => $this->faker->word,
            '39275X42X507' => $this->faker->text,
            '39275X42X508' => $this->faker->word,
            '39275X42X509' => $this->faker->text,
            '39275X42X499SQ001' => $this->faker->word,
            '39275X42X500' => $this->faker->text,
            '39275X43X510' => $this->faker->word,
            '39275X43X512' => $this->faker->word,
            '39275X43X512other' => $this->faker->text,
            '39275X43X514' => $this->faker->word,
            '39275X43X516SQ001' => $this->faker->word,
            '39275X43X517' => $this->faker->text,
            '39275X44X534' => $this->faker->word,
            '39275X44X528SQ001' => $this->faker->word,
            '39275X44X529' => $this->faker->text,
            '39275X44X536SQ001' => $this->faker->word,
            '39275X44X538' => $this->faker->text,
            '39275X44X530SQ001' => $this->faker->word,
            '39275X44X531' => $this->faker->text,
            '39275X45X543' => $this->faker->word,
            '39275X45X542' => $this->faker->word,
        ];
    }
}
