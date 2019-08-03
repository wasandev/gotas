<?php


use Illuminate\Database\Seeder;
use App\Models\Tenant\Businesstype;


class BusinesstypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * ลักษณะรถ.
         */

        $data = [
            'โรงงานอุตสาหกรรม', 'บริษัทขนส่ง', 'ศูนย์กระจายสินค้า', 'คลังสินค้า',
            'หน่วยงานราชการ', 'ร้านค้าส่ง', 'ร้านค้าปลีก', 'โรงแรม/รีสอร์ท', 'อื่นๆ'
        ];

        foreach ($data as $data_businesstype) {
            $businesstype = new Businesstype();
            $businesstype->name = $data_businesstype;
            $businesstype->save();
        }
    }
}
