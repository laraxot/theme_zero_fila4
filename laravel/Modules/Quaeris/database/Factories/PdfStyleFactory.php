<?php

declare(strict_types=1);

namespace Modules\Quaeris\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Models\PdfStyle;

class PdfStyleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = PdfStyle::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->randomNumber(5),
            'style_id' => $this->faker->randomNumber(5),
            'style_type' => $this->faker->word,
            'color' => $this->faker->word,
            'bg_color' => $this->faker->word,
            'font_family' => $this->faker->word,
            'font_size' => $this->faker->word,
            'font_style' => $this->faker->word,
            'backtop' => $this->faker->word,
            'backbottom' => $this->faker->word,
            'backleft' => $this->faker->word,
            'backright' => $this->faker->word,
            'font_size_question' => $this->faker->word,
        ];
    }
}
