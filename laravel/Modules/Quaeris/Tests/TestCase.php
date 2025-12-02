<?php

declare(strict_types=1);

namespace Modules\Quaeris\Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\Passport\Passport;
use Modules\User\Models\OauthClient;
use Modules\User\Models\User;
use Webmozart\Assert\Assert;

// use Orchestra\Testbench\TestCase as OrchestratedTestCase;

abstract class TestCase extends BaseTestCase
{
    public function actingPassport(User $user): void
    {
        Assert::notNull($client = OauthClient::where('secret', null)->first(), '['.__FILE__.']['.__LINE__.']');
        $scopes = [];

        Passport::actingAsClient(
            $client,
            $scopes
        );

        Passport::actingAs(
            $user,
            $scopes
        );
    }
}
