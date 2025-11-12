<?php

declare(strict_types=1);


namespace Modules\Lang\Database\Factories;

use Modules\Lang\Models\TranslationFile;
use Illuminate\Database\Eloquent\Factories\Factory;

class TranslationFileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = TranslationFile::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
