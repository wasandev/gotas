<?php



use Illuminate\Database\Seeder;
use App\Models\Tenant\Permission;
use App\Models\Tenant\Role;

class TenantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // CategoriesTableSeeder::class,
            // ProductStylesTableSeeder::class,
            // DepartmentsTableSeeder::class,
            // PositionsTableSeeder::class,
            // DrivingLicenseTypesTableSeeder::class,
            // UnitsTableSeeder::class,
            // CartypesTableSeeder::class,
            // CarstylesTableSeeder::class,
            // BusinesstypesTableSeeder::class,
            // TiretypesTableSeeder::class,
            // BranchsTableSeeder::class,
            //ThaiAddressTablesSeeder::class,

        ]);
        //$this->addRolesAndPermissions();
    }

    // private function addRolesAndPermissions()
    // {
    //     // create permissions for an admin
    //     $adminPermissions = collect(['create user', 'edit user', 'delete user'])->map(function ($name) {
    //         return Permission::create(['name' => $name, 'guard_name' => 'tenants']);
    //     });
    //     // add admin role
    //     $adminRole = Role::create(['name' => 'admin', 'guard_name' => 'tenants']);
    //     $adminRole->givePermissionTo($adminPermissions);
    //     // add a default user role
    //     Role::create(['name' => 'user', 'guard_name' => 'tenants']);
    // }
}
