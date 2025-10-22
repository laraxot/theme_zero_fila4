<?php

declare(strict_types=1);

use Modules\Cms\Tests\TestHelper;

uses(TestHelper::class);

beforeEach(function (): void {
    $this->super_admin_user = $this->getSuperAdminUser();
    $this->no_super_admin_user = $this->getNoSuperAdminUser();
});

it('user admin can view main dashboard', function (): void {
    $modules_name = $this->getModuleNameLists();

    $this->actingAs($this->super_admin_user)->get('/admin')->assertRedirect('admin/main-dashboard');
    $this->actingAs($this->super_admin_user)->get('/admin/main-dashboard')->assertStatus(200); // ->assertSee($modules_name);
});

it('guest user can view main dashboard', function (): void {
    $this->actingAs($this->no_super_admin_user)->get('/admin')->assertRedirect('admin/main-dashboard');
    $this->actingAs($this->no_super_admin_user)->get('/admin/main-dashboard')->assertStatus(200);
});

it('the user views navigation modules entries based on their role', function (): void {
    $item_navs_roles = $this->getUserNavigationItemUrlRoles($this->super_admin_user);
    foreach ($item_navs_roles as $item_nav_role) {
        $this->actingAs($this->super_admin_user)->get('/admin/main-dashboard')->assertSee($item_nav_role);

        // ->assertSeeText($item_nav_role)
    }
});

it('the user no views navigation modules entries based on their no role', function (): void {
    $diff_navigation_items = $this->getMainAdminNavigationUrlItems()->diff($this->getUserNavigationItemUrlRoles($this->super_admin_user)->all());
    foreach ($diff_navigation_items as $item_nav_role) {
        $this->actingAs($this->super_admin_user)->get('/admin/main-dashboard')->assertDontSee($item_nav_role);

        // ->assertDontSeeText($item_nav_role)
    }
});

it('user admin can view module dashboard', function (): void {
    // $module_name = 'BarberShop';

    // $this->get('/admin')->dd();

    // $this->actingAs($super_admin_user)->get('/admin')->assertRedirect('admin/main-dashboard');
    $this->actingAs($this->super_admin_user)->get('http://multiv.local/barbershop/admin/dashboard')->assertStatus(200); // ->assertSee($modules_name);
})->todo();
