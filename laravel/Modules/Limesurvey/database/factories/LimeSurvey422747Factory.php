<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeSurvey422747;

class LimeSurvey422747Factory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeSurvey422747::class;

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
            '422747X941X32056' => $this->faker->word,
            '422747X941X32033' => $this->faker->word,
            '422747X941X32034' => $this->faker->word,
            '422747X941X32034other' => $this->faker->text,
            '422747X941X32035' => $this->faker->word,
            '422747X942X32036004_01' => $this->faker->text,
            '422747X942X32036004_02' => $this->faker->text,
            '422747X942X32036005_01' => $this->faker->text,
            '422747X942X32036005_02' => $this->faker->text,
            '422747X942X32036006_01' => $this->faker->text,
            '422747X942X32036006_02' => $this->faker->text,
            '422747X942X32036007_01' => $this->faker->text,
            '422747X942X32036007_02' => $this->faker->text,
            '422747X942X32036008_01' => $this->faker->text,
            '422747X942X32036008_02' => $this->faker->text,
            '422747X942X32036009_01' => $this->faker->text,
            '422747X942X32036009_02' => $this->faker->text,
            '422747X942X32036010_01' => $this->faker->text,
            '422747X942X32036010_02' => $this->faker->text,
            '422747X942X32036011_01' => $this->faker->text,
            '422747X942X32036011_02' => $this->faker->text,
            '422747X942X32036012_01' => $this->faker->text,
            '422747X942X32036012_02' => $this->faker->text,
            '422747X942X32036013_01' => $this->faker->text,
            '422747X942X32036013_02' => $this->faker->text,
            '422747X942X32036014_01' => $this->faker->text,
            '422747X942X32036014_02' => $this->faker->text,
            '422747X942X32036015_01' => $this->faker->text,
            '422747X942X32036015_02' => $this->faker->text,
            '422747X942X32036016_01' => $this->faker->text,
            '422747X942X32036016_02' => $this->faker->text,
            '422747X942X32036017_01' => $this->faker->text,
            '422747X942X32036017_02' => $this->faker->text,
            '422747X942X32036018_01' => $this->faker->text,
            '422747X942X32036018_02' => $this->faker->text,
            '422747X942X32036019_01' => $this->faker->text,
            '422747X942X32036019_02' => $this->faker->text,
            '422747X942X32036020_01' => $this->faker->text,
            '422747X942X32036020_02' => $this->faker->text,
            '422747X942X32042' => $this->faker->word,
            '422747X942X32043' => $this->faker->word,
            '422747X942X32044023_001' => $this->faker->text,
            '422747X942X32044023_002' => $this->faker->text,
            '422747X942X32045' => $this->faker->word,
            '422747X942X32046025_001' => $this->faker->text,
            '422747X942X32046025_002' => $this->faker->text,
            '422747X943X32037' => $this->faker->word,
            '422747X943X32047' => $this->faker->word,
            '422747X943X32048' => $this->faker->word,
            '422747X943X320491' => $this->faker->word,
            '422747X943X320492' => $this->faker->word,
            '422747X943X320493' => $this->faker->word,
            '422747X943X320494' => $this->faker->word,
            '422747X943X320495' => $this->faker->word,
            '422747X943X320496' => $this->faker->word,
            '422747X943X320497' => $this->faker->word,
            '422747X943X320498' => $this->faker->word,
            '422747X943X320499' => $this->faker->word,
            '422747X944X32038' => $this->faker->word,
            '422747X944X32039' => $this->faker->word,
            '422747X944X32040' => $this->faker->word,
            '422747X944X32040other' => $this->faker->text,
            '422747X944X32041' => $this->faker->word,
            '422747X944X32052' => $this->faker->text,
            '422747X944X32050' => $this->faker->word,
            '422747X945X32051' => $this->faker->word,
            '422747X945X32053' => $this->faker->word,
            '422747X945X32054' => $this->faker->dateTime,
            '422747X945X32055' => $this->faker->dateTime,
            '422747X945X32057' => $this->faker->text,
            '422747X945X32058' => $this->faker->word,
            '422747X945X32058other' => $this->faker->text,
        ];
    }
}
