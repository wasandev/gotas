<?php



use Illuminate\Database\Seeder;

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
            ProvincesTableSeeder::class,
            BranchsTableSeeder::class,

        ]);
    }
}
