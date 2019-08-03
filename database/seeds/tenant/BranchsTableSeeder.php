<?php


use Illuminate\Database\Seeder;
use App\Models\Tenant\Branch;


class BranchsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * สาขา.
         */
        DB::table('branches')->insert([
            'code' => '00000',
            'name' => 'สำนักงานใหญ่',
        ]);
    }
}
