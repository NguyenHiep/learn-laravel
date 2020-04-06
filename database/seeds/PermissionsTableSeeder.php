<?php

use App\Model\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        // Reset all table permission
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('role_has_permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        // Insert data
        $permissions = [
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'order-list',
            'order-create',
            'order-edit',
            'order-delete',
            'post-list',
            'post-create',
            'post-edit',
            'post-delete',
            'post-category-list',
            'post-category-create',
            'post-category-edit',
            'post-category-delete',
            'post-tag-list',
            'post-tag-create',
            'post-tag-edit',
            'post-tag-delete',
            'media-list',
            'media-create',
            'media-edit',
            'media-delete',
            'slider-list',
            'slider-create',
            'slider-edit',
            'slider-delete',
            'page-list',
            'page-create',
            'page-edit',
            'page-delete',
            'comment-list',
            'comment-create',
            'comment-edit',
            'comment-delete',
            'customer-list',
            'customer-create',
            'customer-edit',
            'customer-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'setting-list',
            'setting-create',
            'setting-edit',
            'setting-delete',
            'dashboard-list'
        ];

        // Update role for user
        foreach ($permissions as $permission) {
            Permission::updateOrCreate([
                'guard_name' => 'admin',
                'name'       => $permission
            ]);
        }

        //Assign role to admins
        $roleAdmin = Role::updateOrCreate([
            'guard_name' => 'admin',
            'name'       => 'Supper Admin'
        ]);
        $roleAdmin->givePermissionTo(Permission::where('guard_name', 'admin')->get());

        $user = User::where('email', 'admin@gmail.com')->first();
        $user->assignRole($roleAdmin);

    }
}
