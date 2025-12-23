<?php

declare(strict_types=1);

namespace Modules\DbForge\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\DbForge\Models\DbForgeMigration;

/**
 * DbForgeMigration factory.
 *
 * @extends Factory<\Modules\DbForge\Models\DbForgeMigration>
 */
class DbForgeMigrationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DbForgeMigration::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'migration_name' => $this->faker->date('Y_m_d_His') . '_' . $this->faker->randomElement(['create_users_table', 'add_email_to_users', 'create_posts_table', 'add_category_to_posts', 'create_comments_table', 'add_status_to_orders', 'create_products_table', 'add_price_to_products', 'create_categories_table', 'add_slug_to_categories']),
            'migration_file' => 'database/migrations/' . $this->faker->date('Y_m_d_His') . '_' . $this->faker->slug(3) . '.php',
            'batch' => $this->faker->numberBetween(1, 100),
            'status' => $this->faker->randomElement(['pending', 'running', 'completed', 'failed', 'rolled_back']),
            'execution_time' => $this->faker->optional()->numberBetween(100, 10000), // milliseconds
            'error_message' => $this->faker->optional()->sentence(),
            'created_by' => $this->faker->optional()->numberBetween(1, 100),
            'executed_at' => $this->faker->optional()->dateTimeBetween('-1 month', 'now'),
            'metadata' => [
                'migration_type' => $this->faker->randomElement(['create', 'add', 'modify', 'drop', 'rename', 'index']),
                'tables_affected' => $this->faker->randomElements(['users', 'posts', 'comments', 'orders', 'products', 'categories'], $this->faker->numberBetween(1, 3)),
                'estimated_time' => $this->faker->numberBetween(100, 5000),
                'dependencies' => $this->faker->optional()->randomElements(['users_table', 'posts_table'], $this->faker->numberBetween(0, 2)),
                'rollback_supported' => $this->faker->boolean(90),
                'backup_before_execution' => $this->faker->boolean(80),
            ],
            'settings' => [
                'force' => $this->faker->boolean(20),
                'pretend' => $this->faker->boolean(10),
                'step' => $this->faker->boolean(30),
                'seed' => $this->faker->boolean(40),
                'refresh' => $this->faker->boolean(20),
            ],
        ];
    }

    /**
     * Indicate that the migration is pending.
     *
     * @return static
     */
    public function pending(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'pending',
            'executed_at' => null,
            'execution_time' => null,
            'error_message' => null,
        ]);
    }

    /**
     * Indicate that the migration is running.
     *
     * @return static
     */
    public function running(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'running',
            'executed_at' => null,
            'execution_time' => null,
            'error_message' => null,
        ]);
    }

    /**
     * Indicate that the migration is completed.
     *
     * @return static
     */
    public function completed(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'completed',
            'executed_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'execution_time' => $this->faker->numberBetween(100, 10000),
            'error_message' => null,
        ]);
    }

    /**
     * Indicate that the migration failed.
     *
     * @return static
     */
    public function failed(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'failed',
            'executed_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'execution_time' => $this->faker->numberBetween(100, 10000),
            'error_message' => $this->faker->sentence(),
        ]);
    }

    /**
     * Indicate that the migration was rolled back.
     *
     * @return static
     */
    public function rolledBack(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'rolled_back',
            'executed_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'execution_time' => $this->faker->numberBetween(100, 10000),
            'error_message' => null,
        ]);
    }

    /**
     * Create a create table migration.
     *
     * @return static
     */
    public function createTable(): static
    {
        return $this->state(fn (array $attributes) => [
            'migration_name' => $this->faker->date('Y_m_d_His') . '_create_' . $this->faker->word() . '_table',
            'metadata' => array_merge($attributes['metadata'] ?? [], [
                'migration_type' => 'create',
                'tables_affected' => [$this->faker->word()],
                'estimated_time' => $this->faker->numberBetween(500, 2000),
                'rollback_supported' => true,
                'backup_before_execution' => false,
            ]),
        ]);
    }

    /**
     * Create an add column migration.
     *
     * @return static
     */
    public function addColumn(): static
    {
        return $this->state(fn (array $attributes) => [
            'migration_name' => $this->faker->date('Y_m_d_His') . '_add_' . $this->faker->word() . '_to_' . $this->faker->word() . '_table',
            'metadata' => array_merge($attributes['metadata'] ?? [], [
                'migration_type' => 'add',
                'tables_affected' => [$this->faker->word()],
                'estimated_time' => $this->faker->numberBetween(100, 1000),
                'rollback_supported' => true,
                'backup_before_execution' => true,
            ]),
        ]);
    }

    /**
     * Create a modify column migration.
     *
     * @return static
     */
    public function modifyColumn(): static
    {
        return $this->state(fn (array $attributes) => [
            'migration_name' => $this->faker->date('Y_m_d_His') . '_modify_' . $this->faker->word() . '_in_' . $this->faker->word() . '_table',
            'metadata' => array_merge($attributes['metadata'] ?? [], [
                'migration_type' => 'modify',
                'tables_affected' => [$this->faker->word()],
                'estimated_time' => $this->faker->numberBetween(200, 1500),
                'rollback_supported' => true,
                'backup_before_execution' => true,
            ]),
        ]);
    }

    /**
     * Create a drop table migration.
     *
     * @return static
     */
    public function dropTable(): static
    {
        return $this->state(fn (array $attributes) => [
            'migration_name' => $this->faker->date('Y_m_d_His') . '_drop_' . $this->faker->word() . '_table',
            'metadata' => array_merge($attributes['metadata'] ?? [], [
                'migration_type' => 'drop',
                'tables_affected' => [$this->faker->word()],
                'estimated_time' => $this->faker->numberBetween(100, 800),
                'rollback_supported' => false,
                'backup_before_execution' => true,
            ]),
        ]);
    }

    /**
     * Create a rename table migration.
     *
     * @return static
     */
    public function renameTable(): static
    {
        return $this->state(fn (array $attributes) => [
            'migration_name' => $this->faker->date('Y_m_d_His') . '_rename_' . $this->faker->word() . '_to_' . $this->faker->word(),
            'metadata' => array_merge($attributes['metadata'] ?? [], [
                'migration_type' => 'rename',
                'tables_affected' => [$this->faker->word(), $this->faker->word()],
                'estimated_time' => $this->faker->numberBetween(100, 500),
                'rollback_supported' => true,
                'backup_before_execution' => true,
            ]),
        ]);
    }

    /**
     * Create an index migration.
     *
     * @return static
     */
    public function createIndex(): static
    {
        return $this->state(fn (array $attributes) => [
            'migration_name' => $this->faker->date('Y_m_d_His') . '_add_' . $this->faker->word() . '_index_to_' . $this->faker->word() . '_table',
            'metadata' => array_merge($attributes['metadata'] ?? [], [
                'migration_type' => 'index',
                'tables_affected' => [$this->faker->word()],
                'estimated_time' => $this->faker->numberBetween(50, 500),
                'rollback_supported' => true,
                'backup_before_execution' => false,
            ]),
        ]);
    }

    /**
     * Create a fast migration.
     *
     * @return static
     */
    public function fast(): static
    {
        return $this->state(fn (array $attributes) => [
            'execution_time' => $this->faker->numberBetween(50, 500),
            'metadata' => array_merge($attributes['metadata'] ?? [], [
                'estimated_time' => $this->faker->numberBetween(50, 500),
                'complexity' => 'low',
            ]),
        ]);
    }

    /**
     * Create a slow migration.
     *
     * @return static
     */
    public function slow(): static
    {
        return $this->state(fn (array $attributes) => [
            'execution_time' => $this->faker->numberBetween(5000, 30000),
            'metadata' => array_merge($attributes['metadata'] ?? [], [
                'estimated_time' => $this->faker->numberBetween(5000, 30000),
                'complexity' => 'high',
                'large_table' => true,
            ]),
        ]);
    }

    /**
     * Create a migration with dependencies.
     *
     * @param array<string> $dependencies
     * @return static
     */
    public function withDependencies(array $dependencies): static
    {
        return $this->state(fn (array $attributes) => [
            'metadata' => array_merge($attributes['metadata'] ?? [], [
                'dependencies' => $dependencies,
            ]),
        ]);
    }

    /**
     * Create a migration for specific batch.
     *
     * @param int $batchNumber
     * @return static
     */
    public function forBatch(int $batchNumber): static
    {
        return $this->state(fn (array $attributes) => [
            'batch' => $batchNumber,
        ]);
    }

    /**
     * Create a migration with specific user.
     *
     * @param int $userId
     * @return static
     */
    public function byUser(int $userId): static
    {
        return $this->state(fn (array $attributes) => [
            'created_by' => $userId,
        ]);
    }

    /**
     * Create a migration that affects specific tables.
     *
     * @param array<string> $tables
     * @return static
     */
    public function affectingTables(array $tables): static
    {
        return $this->state(fn (array $attributes) => [
            'metadata' => array_merge($attributes['metadata'] ?? [], [
                'tables_affected' => $tables,
            ]),
        ]);
    }

    /**
     * Create a migration with rollback support.
     *
     * @return static
     */
    public function withRollback(): static
    {
        return $this->state(fn (array $attributes) => [
            'metadata' => array_merge($attributes['metadata'] ?? [], [
                'rollback_supported' => true,
                'rollback_file' => 'database/migrations/rollback_' . $this->faker->date('Y_m_d_His') . '_' . $this->faker->slug(3) . '.php',
            ]),
        ]);
    }

    /**
     * Create a migration without rollback support.
     *
     * @return static
     */
    public function withoutRollback(): static
    {
        return $this->state(fn (array $attributes) => [
            'metadata' => array_merge($attributes['metadata'] ?? [], [
                'rollback_supported' => false,
                'rollback_file' => null,
            ]),
        ]);
    }

    /**
     * Create a migration with backup before execution.
     *
     * @return static
     */
    public function withBackup(): static
    {
        return $this->state(fn (array $attributes) => [
            'metadata' => array_merge($attributes['metadata'] ?? [], [
                'backup_before_execution' => true,
                'backup_file' => '/backups/migrations/' . $this->faker->date('Y-m-d_H-i-s') . '_' . $this->faker->slug(3) . '.sql',
            ]),
        ]);
    }
}
