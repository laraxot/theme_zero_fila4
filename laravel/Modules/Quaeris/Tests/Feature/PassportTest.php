<?php

declare(strict_types=1);

namespace Modules\Quaeris\Tests\Feature;

use Modules\Quaeris\Tests\PassportTestCase;
use PHPUnit\Framework\Attributes\Test;

// use Illuminate\Foundation\Testing\WithoutMiddleware;
// use Illuminate\Foundation\Testing\DatabaseMigrations;
// use Illuminate\Foundation\Testing\DatabaseTransactions;

class PassportTest extends PassportTestCase
{
    protected $scopes = ['restricted-scope'];

    #[Test]
    public function restrictedRoute(): void
    {
        $this->get('/api/user')->assertResponseOk();
    }

    #[Test]
    public function unrestrictedRoute(): void
    {
        $this->get('/api/restricted')->assertResponseStatus(401);
    }
}
