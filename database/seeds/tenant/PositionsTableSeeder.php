<?php


use Illuminate\Database\Seeder;
use App\Models\Tenant\Position;


class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * ประเภทสินค้า.
         */

        $data = [
            'พนักงานขับรถ', 'กรรมการผู้จัดการ', 'ผู้อำนวยการ', 'ผู้จัดการ',
            'ผู้ช่วยผู้จัดการ', 'หัวหน้าแผนก', 'เจ้าหน้าที่ธุรการ', 'พนักงานประจำรถ',
            'ช่างซ่อมบำรุงรถ', 'พนักงานขึ้น-ลงสินค้า', 'พนักงานรับ-ส่งเอกสาร',
            'พนักงานตีราคา', 'เจ้าหน้าที่', 'พนักงานกำกับสินค้า', 'พนักงานทำความสะอาดออฟฟิต'
        ];


        foreach ($data as $data_position) {
            $position = new Position();
            $position->name = $data_position;
            $position->save();
        }
    }
}
