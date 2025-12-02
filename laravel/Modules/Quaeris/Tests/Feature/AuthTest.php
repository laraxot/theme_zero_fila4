<?php
declare(strict_types=1);
namespace Modules\Quaeris\Tests\Feature;

use Modules\Quaeris\Tests\TestCase;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;

/**
 * @see https://stackoverflow.com/questions/50113508/how-to-test-authentication-via-api-with-laravel-passport
 */
class AuthTest extends TestCase
{
    //use DatabaseMigrations;
    #[Test]
    public function shouldSignIn(): void
    {
        // Arrange
        $body = [
            'client_id' => (string) $this->client->id,
            'client_secret' => $this->client->secret,
            'email' => 'test@test.test',
            'password' => 'secret',
        ];
        // Act
        $this->json('POST', '/api/signin', $body, ['Accept' => 'application/json'])
        // Assert
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'jwt' => [
                        'access_token',
                        'expires_in',
                        'token_type',
                    ],
                ],
                'errors',
            ]);
    }

    #[Group('apilogintests')]
    #[Test]
    public function apiLogin(): void
    {
        $body = [
            'username' => 'admin@admin.com',
            'password' => 'admin',
        ];
        $this->json('POST', '/api/v1/login', $body, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure(['token_type', 'expires_in', 'access_token', 'refresh_token']);
    }

    #[Group('apilogintests')]
    #[Test]
    public function oauthLogin(): void
    {
        $oauth_client_id = env('PASSPORT_CLIENT_ID');
        $oauth_client = OauthClients::findOrFail($oauth_client_id);

        $body = [
            'username' => 'admin@admin.com',
            'password' => 'admin',
            'client_id' => $oauth_client_id,
            'client_secret' => $oauth_client->secret,
            'grant_type' => 'password',
            'scope' => '*',
        ];
        $this->json('POST', '/oauth/token', $body, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure(['token_type', 'expires_in', 'access_token', 'refresh_token']);
    }

    #[Test]
    public function serverCreation(): void
    {
        Passport::actingAs(
            User::factory()->create(),
            ['create-servers']
        );

        $testResponse = $this->post('/api/create-server');

        $testResponse->assertStatus(200);
    }

    /**
     * Test login
     */
    #[Test]
    public function login(): void
    {
        $this->withExceptionHandling();
        $user = User::factory()->create([
            'password' => 'secret',
        ]);

        $testResponse = $this->json('POST', route('api.auth.login'), [
            'email' => $user->email,
            'password' => 'secret',
        ]);

        $testResponse->assertStatus(200);
        $testResponse->assertJsonStructure([
            //...
        ]);
    }
}
