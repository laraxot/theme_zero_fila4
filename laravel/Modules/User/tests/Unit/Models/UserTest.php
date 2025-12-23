<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Modules\User\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_user_with_minimal_data(): void
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'email' => 'test@example.com',
        ]);

        static::assertTrue(Hash::check('password', $user->password));
    }

    public function test_can_create_user_with_all_fields(): void
    {
        $userData = [
            'name' => 'John Doe',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
            'phone' => '+1234567890',
            'address' => '123 Main St',
            'city' => 'New York',
            'state' => 'NY',
            'registration_number' => 'REG123',
            'status' => 'active',
            'type' => 'individual',
            'lang' => 'en',
            'is_active' => true,
            'is_otp' => false,
        ];

        $user = User::factory()->create($userData);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'email' => 'john@example.com',
            'name' => 'John Doe',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone' => '+1234567890',
            'address' => '123 Main St',
            'city' => 'New York',
            'state' => 'NY',
            'registration_number' => 'REG123',
            'status' => 'active',
            'type' => 'individual',
            'lang' => 'en',
            'is_active' => true,
            'is_otp' => false,
        ]);
    }

    public function test_user_has_soft_deletes(): void
    {
        $user = User::factory()->create();
        $userId = $user->id;

        $user->delete();

        $this->assertSoftDeleted('users', ['id' => $userId]);
        $this->assertDatabaseMissing('users', ['id' => $userId]);
    }

    public function test_can_restore_soft_deleted_user(): void
    {
        $user = User::factory()->create();
        $userId = $user->id;

        $user->delete();
        $this->assertSoftDeleted('users', ['id' => $userId]);

        $restoredUser = User::withTrashed()->find($userId);
        $restoredUser->restore();

        $this->assertDatabaseHas('users', ['id' => $userId]);
        static::assertNull($restoredUser->deleted_at);
    }

    public function test_can_find_user_by_email(): void
    {
        $user = User::factory()->create(['email' => 'unique@example.com']);

        $foundUser = User::where('email', 'unique@example.com')->first();

        static::assertNotNull($foundUser);
        static::assertSame($user->id, $foundUser->id);
    }

    public function test_can_find_user_by_name_pattern(): void
    {
        User::factory()->create(['name' => 'John Doe']);
        User::factory()->create(['name' => 'Jane Doe']);
        User::factory()->create(['name' => 'Bob Smith']);

        $doeUsers = User::where('name', 'like', '%Doe%')->get();

        static::assertCount(2, $doeUsers);
        static::assertTrue($doeUsers->every(fn($user) => str_contains($user->name, 'Doe')));
    }

    public function test_can_find_user_by_status(): void
    {
        User::factory()->create(['status' => 'active']);
        User::factory()->create(['status' => 'inactive']);
        User::factory()->create(['status' => 'pending']);

        $activeUsers = User::where('status', 'active')->get();

        static::assertCount(1, $activeUsers);
        static::assertSame('active', $activeUsers->first()->status);
    }

    public function test_can_find_user_by_type(): void
    {
        User::factory()->create(['type' => 'individual']);
        User::factory()->create(['type' => 'company']);
        User::factory()->create(['type' => 'organization']);

        $individualUsers = User::where('type', 'individual')->get();

        static::assertCount(1, $individualUsers);
        static::assertSame('individual', $individualUsers->first()->type);
    }

    public function test_can_find_user_by_city(): void
    {
        User::factory()->create(['city' => 'New York']);
        User::factory()->create(['city' => 'Los Angeles']);
        User::factory()->create(['city' => 'Chicago']);

        $nyUsers = User::where('city', 'New York')->get();

        static::assertCount(1, $nyUsers);
        static::assertSame('New York', $nyUsers->first()->city);
    }

    public function test_can_find_user_by_registration_number(): void
    {
        $user = User::factory()->create(['registration_number' => 'REG123456']);

        $foundUser = User::where('registration_number', 'REG123456')->first();

        static::assertNotNull($foundUser);
        static::assertSame($user->id, $foundUser->id);
    }

    public function test_can_find_user_by_phone(): void
    {
        $user = User::factory()->create(['phone' => '+1234567890']);

        $foundUser = User::where('phone', '+1234567890')->first();

        static::assertNotNull($foundUser);
        static::assertSame($user->id, $foundUser->id);
    }

    public function test_can_find_user_by_language(): void
    {
        User::factory()->create(['lang' => 'en']);
        User::factory()->create(['lang' => 'it']);
        User::factory()->create(['lang' => 'de']);

        $englishUsers = User::where('lang', 'en')->get();

        static::assertCount(1, $englishUsers);
        static::assertSame('en', $englishUsers->first()->lang);
    }

    public function test_can_find_active_users(): void
    {
        User::factory()->create(['is_active' => true]);
        User::factory()->create(['is_active' => false]);
        User::factory()->create(['is_active' => true]);

        $activeUsers = User::where('is_active', true)->get();

        static::assertCount(2, $activeUsers);
        static::assertTrue($activeUsers->every(fn($user) => $user->is_active));
    }

    public function test_can_find_otp_users(): void
    {
        User::factory()->create(['is_otp' => true]);
        User::factory()->create(['is_otp' => false]);
        User::factory()->create(['is_otp' => true]);

        $otpUsers = User::where('is_otp', true)->get();

        static::assertCount(2, $otpUsers);
        static::assertTrue($otpUsers->every(fn($user) => $user->is_otp));
    }

    public function test_can_update_user(): void
    {
        $user = User::factory()->create(['name' => 'Old Name']);

        $user->update(['name' => 'New Name']);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'New Name',
        ]);
    }

    public function test_can_access_socialite(): void
    {
        $user = User::factory()->create();

        static::assertTrue($user->canAccessSocialite());
    }

    public function test_user_has_connection_attribute(): void
    {
        $user = new User();

        static::assertSame('user', $user->connection);
    }

    public function test_can_find_users_by_multiple_criteria(): void
    {
        User::factory()->create([
            'status' => 'active',
            'type' => 'individual',
            'city' => 'New York',
        ]);

        User::factory()->create([
            'status' => 'active',
            'type' => 'company',
            'city' => 'New York',
        ]);

        User::factory()->create([
            'status' => 'inactive',
            'type' => 'individual',
            'city' => 'Los Angeles',
        ]);

        $users = User::where('status', 'active')->where('city', 'New York')->get();

        static::assertCount(2, $users);
        static::assertTrue($users->every(fn($user) => $user->status === 'active' && $user->city === 'New York'));
    }

    public function test_can_handle_null_values(): void
    {
        $user = User::factory()->create([
            'phone' => null,
            'address' => null,
            'city' => null,
            'state' => null,
            'registration_number' => null,
            'status' => null,
            'type' => null,
            'lang' => null,
        ]);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'phone' => null,
            'address' => null,
            'city' => null,
            'state' => null,
            'registration_number' => null,
            'status' => null,
            'type' => null,
            'lang' => null,
        ]);
    }
}
