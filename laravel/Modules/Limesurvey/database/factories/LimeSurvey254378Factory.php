<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeSurvey254378;

class LimeSurvey254378Factory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeSurvey254378::class;

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
            '254378X899X31376' => $this->faker->word,
            '254378X899X31373' => $this->faker->word,
            '254378X899X31374' => $this->faker->word,
            '254378X889X313541_SQ001' => $this->faker->text,
            '254378X889X313541_SQ002' => $this->faker->text,
            '254378X889X313542_SQ001' => $this->faker->text,
            '254378X889X313542_SQ002' => $this->faker->text,
            '254378X889X313543_SQ001' => $this->faker->text,
            '254378X889X313543_SQ002' => $this->faker->text,
            '254378X889X313544_SQ001' => $this->faker->text,
            '254378X889X313544_SQ002' => $this->faker->text,
            '254378X889X313545_SQ001' => $this->faker->text,
            '254378X889X313545_SQ002' => $this->faker->text,
            '254378X889X313546_SQ001' => $this->faker->text,
            '254378X889X313546_SQ002' => $this->faker->text,
            '254378X889X313547_SQ001' => $this->faker->text,
            '254378X889X313547_SQ002' => $this->faker->text,
            '254378X890X31355' => $this->faker->word,
            '254378X892X31360' => $this->faker->word,
            '254378X892X313611' => $this->faker->word,
            '254378X892X313612' => $this->faker->word,
            '254378X892X313613' => $this->faker->word,
            '254378X892X313614' => $this->faker->word,
            '254378X892X313615' => $this->faker->word,
            '254378X892X313616' => $this->faker->word,
            '254378X892X31361other' => $this->faker->text,
            '254378X892X3136211_SQ001' => $this->faker->text,
            '254378X892X3136211_SQ002' => $this->faker->text,
            '254378X892X3136212_SQ001' => $this->faker->text,
            '254378X892X3136212_SQ002' => $this->faker->text,
            '254378X892X3136213_SQ001' => $this->faker->text,
            '254378X892X3136213_SQ002' => $this->faker->text,
            '254378X892X3136214_SQ001' => $this->faker->text,
            '254378X892X3136214_SQ002' => $this->faker->text,
            '254378X892X3136215_SQ001' => $this->faker->text,
            '254378X892X3136215_SQ002' => $this->faker->text,
            '254378X893X31363' => $this->faker->word,
            '254378X893X313641' => $this->faker->word,
            '254378X893X313642' => $this->faker->word,
            '254378X893X313643' => $this->faker->word,
            '254378X893X31364other' => $this->faker->text,
            '254378X893X3136513_SQ001' => $this->faker->text,
            '254378X893X3136513_SQ002' => $this->faker->text,
            '254378X893X3144113_SQ001' => $this->faker->text,
            '254378X893X3144113_SQ002' => $this->faker->text,
            '254378X894X31366' => $this->faker->word,
            '254378X894X3136713_SQ001' => $this->faker->text,
            '254378X894X3136713_SQ002' => $this->faker->text,
            '254378X896X31369SQ001' => $this->faker->word,
            '254378X896X31369SQ002' => $this->faker->word,
            '254378X896X31369SQ003' => $this->faker->word,
            '254378X896X31369SQ004' => $this->faker->word,
            '254378X896X31369SQ005' => $this->faker->word,
            '254378X896X31369SQ006' => $this->faker->word,
            '254378X896X31369SQ007' => $this->faker->word,
            '254378X896X31369SQ008' => $this->faker->word,
            '254378X896X31369other' => $this->faker->text,
            '254378X898X31371' => $this->faker->word,
            '254378X898X31372' => $this->faker->word,
            '254378X898X31377' => $this->faker->word,
        ];
    }
}
