<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\User\Models\Role;
use Modules\User\Models\Team;
use Tests\TestCase;

class RoleTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_role_with_minimal_data(): void
    {
        $role = Role::factory()->create([
            'name' => 'Test Role',
            'guard_name' => 'web',
        ]);

        $this->assertDatabaseHas('roles', [
            'id' => $role->id,
            'name' => 'Test Role',
            'guard_name' => 'web',
        ]);
    }

    public function test_can_create_role_with_all_fields(): void
    {
        $team = Team::factory()->create();

        $roleData = [
            'name' => 'Full Role',
            'guard_name' => 'web',
            'team_id' => $team->id,
            'uuid' => '550e8400-e29b-41d4-a716-446655440000',
        ];

        $role = Role::factory()->create($roleData);

        $this->assertDatabaseHas('roles', [
            'id' => $role->id,
            'name' => 'Full Role',
            'guard_name' => 'web',
            'team_id' => $team->id,
            'uuid' => '550e8400-e29b-41d4-a716-446655440000',
        ]);
    }

    public function test_role_has_connection_attribute(): void
    {
        $role = new Role();

        static::assertSame('user', $role->connection);
    }

    public function test_role_has_key_type_attribute(): void
    {
        $role = new Role();

        static::assertSame('string', $role->keyType);
    }

    public function test_role_constants_are_defined(): void
    {
        static::assertSame(1, Role::ROLE_ADMINISTRATOR);
        static::assertSame(2, Role::ROLE_OWNER);
        static::assertSame(3, Role::ROLE_USER);
    }

    public function test_can_find_role_by_name(): void
    {
        $role = Role::factory()->create(['name' => 'Unique Role Name']);

        $foundRole = Role::where('name', 'Unique Role Name')->first();

        static::assertNotNull($foundRole);
        static::assertSame($role->id, $foundRole->id);
    }

    public function test_can_find_role_by_guard_name(): void
    {
        Role::factory()->create(['guard_name' => 'web']);
        Role::factory()->create(['guard_name' => 'api']);
        Role::factory()->create(['guard_name' => 'web']);

        $webRoles = Role::where('guard_name', 'web')->get();

        static::assertCount(2, $webRoles);
        static::assertTrue($webRoles->every(fn($role) => $role->guard_name === 'web'));
    }

    public function test_can_find_role_by_team_id(): void
    {
        $team = Team::factory()->create();
        $role = Role::factory()->create(['team_id' => $team->id]);

        $foundRole = Role::where('team_id', $team->id)->first();

        static::assertNotNull($foundRole);
        static::assertSame($role->id, $foundRole->id);
    }

    public function test_can_find_role_by_uuid(): void
    {
        $uuid = '550e8400-e29b-41d4-a716-446655440000';
        $role = Role::factory()->create(['uuid' => $uuid]);

        $foundRole = Role::where('uuid', $uuid)->first();

        static::assertNotNull($foundRole);
        static::assertSame($role->id, $foundRole->id);
    }

    public function test_can_find_roles_by_name_pattern(): void
    {
        Role::factory()->create(['name' => 'Admin Role']);
        Role::factory()->create(['name' => 'User Role']);
        Role::factory()->create(['name' => 'Manager Role']);

        $adminRoles = Role::where('name', 'like', '%Role%')->get();

        static::assertCount(3, $adminRoles);
        static::assertTrue($adminRoles->every(fn($role) => str_contains($role->name, 'Role')));
    }

    public function test_can_update_role(): void
    {
        $role = Role::factory()->create(['name' => 'Old Name']);

        $role->update(['name' => 'New Name']);

        $this->assertDatabaseHas('roles', [
            'id' => $role->id,
            'name' => 'New Name',
        ]);
    }

    public function test_can_handle_null_values(): void
    {
        $role = Role::factory()->create([
            'name' => 'Test Role',
            'guard_name' => 'web',
            'team_id' => null,
            'uuid' => null,
        ]);

        $this->assertDatabaseHas('roles', [
            'id' => $role->id,
            'team_id' => null,
            'uuid' => null,
        ]);
    }

    public function test_can_find_roles_by_multiple_criteria(): void
    {
        $team = Team::factory()->create();
        Role::factory()->create([
            'name' => 'Admin Role',
            'guard_name' => 'web',
            'team_id' => $team->id,
        ]);

        Role::factory()->create([
            'name' => 'User Role',
            'guard_name' => 'api',
            'team_id' => $team->id,
        ]);

        $roles = Role::where('team_id', $team->id)->where('guard_name', 'web')->get();

        static::assertCount(1, $roles);
        static::assertSame('Admin Role', $roles->first()->name);
        static::assertSame('web', $roles->first()->guard_name);
    }

    public function test_role_has_permissions_relationship(): void
    {
        $role = Role::factory()->create();

        static::assertTrue(method_exists($role, 'permissions'));
    }

    public function test_role_has_team_relationship(): void
    {
        $role = Role::factory()->create();

        static::assertTrue(method_exists($role, 'team'));
    }

    public function test_role_has_users_relationship(): void
    {
        $role = Role::factory()->create();

        static::assertTrue(method_exists($role, 'users'));
    }

    public function test_role_can_use_permission_scopes(): void
    {
        $role = Role::factory()->create();

        static::assertTrue(method_exists($role, 'permission'));
        static::assertTrue(method_exists($role, 'withoutPermission'));
    }

    public function test_role_can_use_role_scopes(): void
    {
        $role = Role::factory()->create();

        static::assertTrue(method_exists($role, 'role'));
        static::assertTrue(method_exists($role, 'withoutRole'));
    }
}
