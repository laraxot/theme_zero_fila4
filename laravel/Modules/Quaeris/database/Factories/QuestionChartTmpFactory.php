<?php

declare(strict_types=1);

namespace Modules\Quaeris\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Quaeris\Models\QuestionChartTmp;

class QuestionChartTmpFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = QuestionChartTmp::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'survey_pdf_id' => $this->faker->randomNumber(5),
            'question' => $this->faker->word,
            'question_txt' => $this->faker->word,
            'subquestion' => $this->faker->word,
            'width' => $this->faker->word,
            'height' => $this->faker->word,
            'group_by' => $this->faker->word,
            'sort_by' => $this->faker->word,
            'take' => $this->faker->randomNumber(5),
            'chart_type' => $this->faker->word,
            'pos' => $this->faker->randomNumber(5),
            'min' => $this->faker->randomFloat(),
            'max' => $this->faker->randomFloat(),
            'col_size' => $this->faker->randomNumber(5),
            'img_src' => $this->faker->word,
            'generated_at' => $this->faker->dateTime,
            'answer_value' => $this->faker->word,
            'title' => $this->faker->sentence,
            'subtitle' => $this->faker->word,
            'answer_value_txt' => $this->faker->word,
            'answer_value_no_txt' => $this->faker->word,
            'group_name' => $this->faker->word,
            'question_type' => $this->faker->word,
            'subquestion_type' => $this->faker->word,
            'question_title' => $this->faker->word,
            'page_type' => $this->faker->word,
            'data_type' => $this->faker->word,
            'add_nulls' => $this->faker->word,
            'interval' => $this->faker->word,
            'show_on_pdf' => $this->faker->boolean,
            'show_tot_invited' => $this->faker->boolean,
            'field_name' => $this->faker->word,
            'group_title' => $this->faker->word,
        ];
    }
}
