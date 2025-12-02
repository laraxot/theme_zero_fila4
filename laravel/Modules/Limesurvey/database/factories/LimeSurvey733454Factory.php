<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimeSurvey733454;

class LimeSurvey733454Factory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimeSurvey733454::class;

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
            '733454X953X32199' => $this->faker->word,
            '733454X954X321792_01' => $this->faker->text,
            '733454X954X321792_02' => $this->faker->text,
            '733454X954X321793_01' => $this->faker->text,
            '733454X954X321793_02' => $this->faker->text,
            '733454X954X321794_01' => $this->faker->text,
            '733454X954X321794_02' => $this->faker->text,
            '733454X954X321795_01' => $this->faker->text,
            '733454X954X321795_02' => $this->faker->text,
            '733454X954X321796_01' => $this->faker->text,
            '733454X954X321796_02' => $this->faker->text,
            '733454X954X321797_01' => $this->faker->text,
            '733454X954X321797_02' => $this->faker->text,
            '733454X954X321798_01' => $this->faker->text,
            '733454X954X321798_02' => $this->faker->text,
            '733454X954X321799_01' => $this->faker->text,
            '733454X954X321799_02' => $this->faker->text,
            '733454X954X3217910_01' => $this->faker->text,
            '733454X954X3217910_02' => $this->faker->text,
            '733454X954X3217911_01' => $this->faker->text,
            '733454X954X3217911_02' => $this->faker->text,
            '733454X954X3217912_01' => $this->faker->text,
            '733454X954X3217912_02' => $this->faker->text,
            '733454X954X3217913_01' => $this->faker->text,
            '733454X954X3217913_02' => $this->faker->text,
            '733454X954X3217914_01' => $this->faker->text,
            '733454X954X3217914_02' => $this->faker->text,
            '733454X954X3217915_01' => $this->faker->text,
            '733454X954X3217915_02' => $this->faker->text,
            '733454X954X3217916_01' => $this->faker->text,
            '733454X954X3217916_02' => $this->faker->text,
            '733454X954X3217917_01' => $this->faker->text,
            '733454X954X3217917_02' => $this->faker->text,
            '733454X954X3217918_01' => $this->faker->text,
            '733454X954X3217918_02' => $this->faker->text,
            '733454X954X3217919_01' => $this->faker->text,
            '733454X954X3217919_02' => $this->faker->text,
            '733454X954X32180' => $this->faker->word,
            '733454X954X32185' => $this->faker->word,
            '733454X955X32186' => $this->faker->word,
            '733454X955X32187' => $this->faker->word,
            '733454X958X32188' => $this->faker->word,
            '733454X958X32190' => $this->faker->word,
            '733454X958X32255' => $this->faker->word,
            '733454X956X32177' => $this->faker->word,
            '733454X956X32177other' => $this->faker->text,
            '733454X956X32176' => $this->faker->word,
            '733454X956X32178' => $this->faker->word,
            '733454X956X32178other' => $this->faker->text,
            '733454X956X32183' => $this->faker->word,
            '733454X956X32183other' => $this->faker->text,
            '733454X956X32182' => $this->faker->randomFloat(),
            '733454X956X32181' => $this->faker->word,
            '733454X956X32184' => $this->faker->text,
            '733454X956X32193' => $this->faker->word,
            '733454X957X32194' => $this->faker->word,
            '733454X957X32196' => $this->faker->word,
            '733454X957X32197' => $this->faker->dateTime,
            '733454X957X32198' => $this->faker->dateTime,
            '733454X957X32200' => $this->faker->text,
            '733454X957X32201' => $this->faker->word,
            '733454X957X32201other' => $this->faker->text,
        ];
    }
}
