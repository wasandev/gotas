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
            CategoriesTableSeeder::class,
            ProductStylesTableSeeder::class,
            DepartmentsTableSeeder::class,
            PositionsTableSeeder::class,
            DrivingLicenseTypesTableSeeder::class,
            UnitsTableSeeder::class,
            CartypesTableSeeder::class,
            CarstylesTableSeeder::class,
            BusinesstypesTableSeeder::class,
            TiretypesTableSeeder::class,
            BranchsTableSeeder::class,
            ThaiAddressTablesSeeder::class,

        ]);
    }
}
