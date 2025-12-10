<?php

declare(strict_types=1);

namespace Modules\Setting\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Setting\Models\DatabaseConnection;

/**
 * DatabaseConnection factory.
 *
 * @extends Factory<DatabaseConnection>
 */
class DatabaseConnectionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DatabaseConnection::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word(),
            'driver' => $this->faker->randomElement(['mysql', 'pgsql', 'sqlite', 'sqlsrv']),
            'host' => $this->faker->ipv4(),
            'port' => $this->faker->numberBetween(3306, 5432),
            'database' => $this->faker->word(),
            'username' => $this->faker->userName(),
            'password' => $this->faker->password(),
            'charset' => $this->faker->randomElement(['utf8', 'utf8mb4', 'latin1']),
            'collation' => $this->faker->randomElement(['utf8_unicode_ci', 'utf8mb4_unicode_ci']),
            'prefix' => $this->faker->optional()->word(),
            'prefix_indexes' => $this->faker->boolean(),
            'strict' => $this->faker->boolean(),
            'engine' => $this->faker->optional()->randomElement(['InnoDB', 'MyISAM']),
            'options' => $this->faker->optional()->randomElements([
                'PDO::ATTR_CASE' => 'PDO::CASE_NATURAL',
                'PDO::ATTR_ERRMODE' => 'PDO::ERRMODE_EXCEPTION',
                'PDO::ATTR_ORACLE_NULLS' => 'PDO::NULL_NATURAL',
                'PDO::ATTR_STRINGIFY_FETCHES' => false,
                'PDO::ATTR_EMULATE_PREPARES' => false,
            ], $this->faker->numberBetween(0, 3)),
            'is_active' => $this->faker->boolean(80),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }

    /**
     * Indicate that the connection is active.
     */
    public function active(): static
    {
        return $this->state(static fn (array $attributes) => [
            'is_active' => true,
        ]);
    }

    /**
     * Indicate that the connection is inactive.
     */
    public function inactive(): static
    {
        return $this->state(static fn (array $attributes) => [
            'is_active' => false,
        ]);
    }

    /**
     * Indicate that the connection uses MySQL.
     */
    public function mysql(): static
    {
        return $this->state(static fn (array $attributes) => [
            'driver' => 'mysql',
            'port' => 3306,
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'engine' => 'InnoDB',
        ]);
    }

    /**
     * Indicate that the connection uses PostgreSQL.
     */
    public function postgresql(): static
    {
        return $this->state(static fn (array $attributes) => [
            'driver' => 'pgsql',
            'port' => 5432,
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
        ]);
    }

    /**
     * Indicate that the connection uses SQLite.
     */
    public function sqlite(): static
    {
        return $this->state(static fn (array $attributes) => [
            'driver' => 'sqlite',
            'host' => null,
            'port' => null,
            'username' => null,
            'password' => null,
            'charset' => null,
            'collation' => null,
            'engine' => null,
        ]);
    }
}
