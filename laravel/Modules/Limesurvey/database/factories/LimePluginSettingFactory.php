<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimePluginSetting;

class LimePluginSettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimePluginSetting::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'plugin_id' => $this->faker->randomNumber(5, false),
            'model' => $this->faker->word,
            'model_id' => $this->faker->randomNumber(5, false),
            'key' => $this->faker->word,
            'value' => $this->faker->text,
        ];
    }
}
