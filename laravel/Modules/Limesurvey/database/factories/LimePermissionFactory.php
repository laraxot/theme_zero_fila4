<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Limesurvey\Models\LimePermission;

class LimePermissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = LimePermission::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'entity' => $this->faker->word,
            'entity_id' => $this->faker->randomNumber(5, false),
            'uid' => $this->faker->randomNumber(5, false),
            'permission' => $this->faker->word,
            'create_p' => $this->faker->randomNumber(5, false),
            'read_p' => $this->faker->randomNumber(5, false),
            'update_p' => $this->faker->randomNumber(5, false),
            'delete_p' => $this->faker->randomNumber(5, false),
            'import_p' => $this->faker->randomNumber(5, false),
            'export_p' => $this->faker->randomNumber(5, false),
        ];
    }
}
