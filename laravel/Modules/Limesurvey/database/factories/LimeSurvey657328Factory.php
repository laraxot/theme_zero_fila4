<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeSurvey657328;

class LimeSurvey657328Factory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeSurvey657328::class;

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
            '657328X657X29081' => $this->faker->word,
            '657328X657X29080' => $this->faker->word,
            '657328X657X28842' => $this->faker->word,
            '657328X657X28843SQ001' => $this->faker->word,
            '657328X657X28843SQ002' => $this->faker->word,
            '657328X657X28843SQ003' => $this->faker->word,
            '657328X657X28843SQ004' => $this->faker->word,
            '657328X657X28843SQ005' => $this->faker->word,
            '657328X657X28843SQ006' => $this->faker->word,
            '657328X657X28843SQ007' => $this->faker->word,
            '657328X658X28844' => $this->faker->word,
            '657328X658X28845' => $this->faker->text,
            '657328X658X28921SQ001' => $this->faker->word,
            '657328X658X28921SQ002' => $this->faker->word,
            '657328X658X28921SQ003' => $this->faker->word,
            '657328X658X28921SQ004' => $this->faker->word,
            '657328X658X28921SQ005' => $this->faker->word,
            '657328X658X28929' => $this->faker->word,
            '657328X658X28930' => $this->faker->text,
            '657328X658X28852SQ001' => $this->faker->word,
            '657328X658X28853' => $this->faker->text,
            '657328X659X28854' => $this->faker->word,
            '657328X659X28855' => $this->faker->text,
            '657328X659X28931SQ001' => $this->faker->word,
            '657328X659X28931SQ002' => $this->faker->word,
            '657328X659X28931SQ003' => $this->faker->word,
            '657328X659X28858' => $this->faker->word,
            '657328X659X28940SQ001' => $this->faker->word,
            '657328X659X28940SQ002' => $this->faker->word,
            '657328X659X28940SQ003' => $this->faker->word,
            '657328X659X28947' => $this->faker->word,
            '657328X659X28948' => $this->faker->text,
            '657328X659X28862SQ001' => $this->faker->word,
            '657328X659X28863' => $this->faker->text,
            '657328X660X28864' => $this->faker->word,
            '657328X660X28892SQ001' => $this->faker->word,
            '657328X660X28893' => $this->faker->text,
            '657328X660X28949SQ001' => $this->faker->word,
            '657328X660X28949SQ002' => $this->faker->word,
            '657328X660X28949SQ003' => $this->faker->word,
            '657328X660X28949SQ004' => $this->faker->word,
            '657328X660X28949SQ005' => $this->faker->word,
            '657328X660X28949SQ006' => $this->faker->word,
            '657328X660X28959' => $this->faker->word,
            '657328X660X28960' => $this->faker->text,
            '657328X660X28868SQ001' => $this->faker->word,
            '657328X660X28961' => $this->faker->text,
            '657328X664X28962SQ001' => $this->faker->word,
            '657328X664X28962SQ002' => $this->faker->word,
            '657328X664X28962SQ003' => $this->faker->word,
            '657328X664X28962SQ004' => $this->faker->word,
            '657328X664X28962SQ005' => $this->faker->word,
            '657328X664X28980' => $this->faker->word,
            '657328X664X28981' => $this->faker->text,
            '657328X664X28965SQ001' => $this->faker->word,
            '657328X664X28966' => $this->faker->text,
            '657328X661X28982SQ001' => $this->faker->word,
            '657328X661X28982SQ002' => $this->faker->word,
            '657328X661X28982SQ003' => $this->faker->word,
            '657328X661X28982SQ004' => $this->faker->word,
            '657328X661X28982SQ005' => $this->faker->word,
            '657328X661X28993' => $this->faker->word,
            '657328X661X28994' => $this->faker->text,
            '657328X661X28878SQ001' => $this->faker->word,
            '657328X661X29041' => $this->faker->text,
            '657328X665X28968' => $this->faker->word,
            '657328X665X28969' => $this->faker->word,
            '657328X665X28969other' => $this->faker->text,
            '657328X665X28995' => $this->faker->word,
            '657328X665X28996SQ001' => $this->faker->word,
            '657328X665X28996SQ002' => $this->faker->word,
            '657328X665X29004' => $this->faker->word,
            '657328X665X29005' => $this->faker->text,
            '657328X665X28971SQ001' => $this->faker->word,
            '657328X665X28972' => $this->faker->text,
            '657328X662X28880' => $this->faker->word,
            '657328X662X28881SQ001' => $this->faker->word,
            '657328X662X28881SQ002' => $this->faker->word,
            '657328X662X28881SQ003' => $this->faker->word,
            '657328X662X28881SQ004' => $this->faker->word,
            '657328X662X28881SQ005' => $this->faker->word,
            '657328X662X28881SQ006' => $this->faker->word,
            '657328X662X28881other' => $this->faker->text,
            '657328X662X29012' => $this->faker->word,
            '657328X662X29012other' => $this->faker->text,
            '657328X662X29018SQ001' => $this->faker->word,
            '657328X662X29018SQ002' => $this->faker->word,
            '657328X662X29018SQ003' => $this->faker->word,
            '657328X662X29018SQ004' => $this->faker->word,
            '657328X662X29018SQ005' => $this->faker->word,
            '657328X662X29029' => $this->faker->word,
            '657328X662X28882SQ001' => $this->faker->word,
            '657328X662X28883' => $this->faker->text,
            '657328X663X28890' => $this->faker->word,
            '657328X663X28891' => $this->faker->word,
            '657328X663X29030' => $this->faker->text,
        ];
    }
}
