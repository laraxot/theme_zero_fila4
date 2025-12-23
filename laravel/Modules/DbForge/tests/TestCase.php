<?php

declare(strict_types=1);

namespace Modules\DbForge\Tests;

use Modules\DbForge\Providers\DbForgeServiceProvider;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;

/**
 * Base test case for DbForge module tests.
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        // Load DbForge module specific configurations
        $this->loadLaravelMigrations();
        
        // Seed any required data for DbForge tests
        $this->artisan('module:seed', ['module' => 'DbForge']);
    }

    /**
     * Get package providers.
     *
     * @param Application $app
     * @return array<int, class-string>
     */
    protected function getPackageProviders($app): array
    {
        return [
            DbForgeServiceProvider::class,
        ];
    }
}
