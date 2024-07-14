<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles dan permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        
        // permission benefits
        Permission::create(['name' => 'view benefits']);
        Permission::create(['name' => 'create benefits']);
        Permission::create(['name' => 'update benefits']);
        Permission::create(['name' => 'delete benefits']);
        Permission::create(['name' => 'restore benefits']);

        // permission categories
        Permission::create(['name' => 'view categories']);
        Permission::create(['name' => 'create categories']);
        Permission::create(['name' => 'update categories']);
        Permission::create(['name' => 'delete categories']);
        Permission::create(['name' => 'restore categories']);

        // permission faqs
        Permission::create(['name' => 'view faqs']);
        Permission::create(['name' => 'create faqs']);
        Permission::create(['name' => 'update faqs']);
        Permission::create(['name' => 'delete faqs']);
        Permission::create(['name' => 'restore faqs']);

        // permission lessons
        Permission::create(['name' => 'view lessons']);
        Permission::create(['name' => 'create lessons']);
        Permission::create(['name' => 'update lessons']);
        Permission::create(['name' => 'delete lessons']);
        Permission::create(['name' => 'restore lessons']);

        // permission pages
        Permission::create(['name' => 'view pages']);
        Permission::create(['name' => 'create pages']);
        Permission::create(['name' => 'update pages']);
        Permission::create(['name' => 'delete pages']);
        Permission::create(['name' => 'restore pages']);

        // permission popularities
        Permission::create(['name' => 'view popularities']);
        Permission::create(['name' => 'create popularities']);
        Permission::create(['name' => 'update popularities']);
        Permission::create(['name' => 'delete popularities']);
        Permission::create(['name' => 'restore popularities']);

        // permission products
        Permission::create(['name' => 'view products']);
        Permission::create(['name' => 'create products']);
        Permission::create(['name' => 'update products']);
        Permission::create(['name' => 'delete products']);
        Permission::create(['name' => 'restore products']);

        // permission profilecompanies
        Permission::create(['name' => 'view profilecompanies']);
        Permission::create(['name' => 'create profilecompanies']);
        Permission::create(['name' => 'update profilecompanies']);
        Permission::create(['name' => 'delete profilecompanies']);
        Permission::create(['name' => 'restore profilecompanies']);

        // permission sections
        Permission::create(['name' => 'view sections']);
        Permission::create(['name' => 'create sections']);
        Permission::create(['name' => 'update sections']);
        Permission::create(['name' => 'delete sections']);
        Permission::create(['name' => 'restore sections']);

        // permission transactions
        Permission::create(['name' => 'view transactions']);
        Permission::create(['name' => 'create transactions']);
        Permission::create(['name' => 'update transactions']);
        Permission::create(['name' => 'delete transactions']);
        Permission::create(['name' => 'restore transactions']);

        // permission transactiondetails
        Permission::create(['name' => 'view transactiondetails']);
        Permission::create(['name' => 'create transactiondetails']);
        Permission::create(['name' => 'update transactiondetails']);
        Permission::create(['name' => 'delete transactiondetails']);
        Permission::create(['name' => 'restore transactiondetails']);

        // permission users
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'restore users']);

        // admin exclusive permissions
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);
        Permission::create(['name' => 'restore roles']);

        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);
        Permission::create(['name' => 'restore permissions']);

        Permission::create(['name' => 'view dashboard admin']);
        Permission::create(['name' => 'view data master']);
        Permission::create(['name' => 'view fitur']);
        Permission::create(['name' => 'view report']);

        // create role supper
        $superRole = Role::create(['name' => 'super']);

        // membuat role admin dan meng assign semua permission
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        // asign role super-admin
        $user = User::where('email', 'zielabadmin77@gmail.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }

        // membuat permission untuk user
        Permission::create(['name' => 'view dashboard user']);
        Permission::create(['name' => 'view my product']);
        Permission::create(['name' => 'view my profile']);

        // membuat role user dan meng assign permission
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo(['view dashboard user', 'view my product', 'view my profile']);

    }
}
