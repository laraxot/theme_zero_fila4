<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeSurvey153495;

class LimeSurvey153495Factory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeSurvey153495::class;

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
            '153495X878X31352' => $this->faker->word,
            '153495X878X31176' => $this->faker->word,
            '153495X878X31177' => $this->faker->word,
            '153495X868X310691_SQ001' => $this->faker->text,
            '153495X868X310691_SQ002' => $this->faker->text,
            '153495X868X310692_SQ001' => $this->faker->text,
            '153495X868X310692_SQ002' => $this->faker->text,
            '153495X868X310693_SQ001' => $this->faker->text,
            '153495X868X310693_SQ002' => $this->faker->text,
            '153495X868X310694_SQ001' => $this->faker->text,
            '153495X868X310694_SQ002' => $this->faker->text,
            '153495X868X310695_SQ001' => $this->faker->text,
            '153495X868X310695_SQ002' => $this->faker->text,
            '153495X868X310696_SQ001' => $this->faker->text,
            '153495X868X310696_SQ002' => $this->faker->text,
            '153495X868X310697_SQ001' => $this->faker->text,
            '153495X868X310697_SQ002' => $this->faker->text,
            '153495X868X310698_SQ001' => $this->faker->text,
            '153495X868X310698_SQ002' => $this->faker->text,
            '153495X868X310699_SQ001' => $this->faker->text,
            '153495X868X310699_SQ002' => $this->faker->text,
            '153495X868X3106910_SQ001' => $this->faker->text,
            '153495X868X3106910_SQ002' => $this->faker->text,
            '153495X868X313381_SQ001' => $this->faker->text,
            '153495X868X313381_SQ002' => $this->faker->text,
            '153495X869X31093' => $this->faker->word,
            '153495X870X31094' => $this->faker->word,
            '153495X870X3109513_SQ001' => $this->faker->text,
            '153495X870X3109513_SQ002' => $this->faker->text,
            '153495X870X31108' => $this->faker->word,
            '153495X870X3110913_SQ001' => $this->faker->text,
            '153495X870X3110913_SQ002' => $this->faker->text,
            '153495X871X31113' => $this->faker->word,
            '153495X871X311141' => $this->faker->word,
            '153495X871X311142' => $this->faker->word,
            '153495X871X311143' => $this->faker->word,
            '153495X871X311144' => $this->faker->word,
            '153495X871X311145' => $this->faker->word,
            '153495X871X311146' => $this->faker->word,
            '153495X871X31114other' => $this->faker->text,
            '153495X871X3112318_SQ001' => $this->faker->text,
            '153495X871X3112318_SQ002' => $this->faker->text,
            '153495X871X3112319_SQ001' => $this->faker->text,
            '153495X871X3112319_SQ002' => $this->faker->text,
            '153495X871X3112320_SQ001' => $this->faker->text,
            '153495X871X3112320_SQ002' => $this->faker->text,
            '153495X871X3112321_SQ001' => $this->faker->text,
            '153495X871X3112321_SQ002' => $this->faker->text,
            '153495X871X3112322_SQ001' => $this->faker->text,
            '153495X871X3112322_SQ002' => $this->faker->text,
            '153495X872X31142' => $this->faker->word,
            '153495X872X311431' => $this->faker->word,
            '153495X872X311432' => $this->faker->word,
            '153495X872X311433' => $this->faker->word,
            '153495X872X31143other' => $this->faker->text,
            '153495X872X3115313_SQ001' => $this->faker->text,
            '153495X872X3115313_SQ002' => $this->faker->text,
            '153495X873X31157' => $this->faker->word,
            '153495X873X3115813_SQ001' => $this->faker->text,
            '153495X873X3115813_SQ002' => $this->faker->text,
            '153495X874X31162' => $this->faker->word,
            '153495X875X31163SQ001' => $this->faker->word,
            '153495X875X31163SQ002' => $this->faker->word,
            '153495X875X31163SQ003' => $this->faker->word,
            '153495X875X31163SQ004' => $this->faker->word,
            '153495X875X31163SQ005' => $this->faker->word,
            '153495X875X31163SQ006' => $this->faker->word,
            '153495X875X31163SQ007' => $this->faker->word,
            '153495X875X31163SQ008' => $this->faker->word,
            '153495X875X31163other' => $this->faker->text,
            '153495X876X31173' => $this->faker->word,
            '153495X877X31174' => $this->faker->word,
            '153495X877X31175' => $this->faker->word,
            '153495X877X31353' => $this->faker->word,
        ];
    }
}
