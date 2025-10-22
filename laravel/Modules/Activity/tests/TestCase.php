<?php

declare(strict_types=1);

namespace Modules\Activity\Tests;

use Illuminate\Foundation\Application;
use Modules\Activity\Providers\ActivityServiceProvider;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;

/**
 * Base test case for Activity module tests.
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

        // Load Activity module specific configurations
        $this->artisan('migrate', ['--database' => 'testing']);

        // Seed any required data for Activity tests
        $this->artisan('module:seed', ['module' => 'Activity']);
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
            ActivityServiceProvider::class,
        ];
    }
}
