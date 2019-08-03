<?php


use Illuminate\Database\Seeder;
use App\Models\Tenant\Carstyle;


class CarstylesTableSeeder extends Seeder
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
            'หัวเดียว', 'ตู้คอนเทนเนอร์',
            'รถบรรทุกน้ำมัน', 'มีคอกข้างไม่มีหลังคา', 'มีคอกข้างไม่มีหลังคา มีเฮียบ',
            'มีคอกข้าง มีหลังคา', 'ตู้ทึบ', 'ตู้ทึบห้องเย็น', 'พื้นเรียบ', 'พื้นเรียบ มีเฮียบ',
            'มีคอกข้างไม่มีหลังคากระบะยกเทได้', 'รถบรรทุกน้ำ', 'รถบรรทุกน้ำมันเชื้อเพลิง',
            'รถบรรทุกก๊าซ', 'รถบรรทุกปูนผง(เต้า)', 'รถบรรทุกคอนกรีตผสมเสร็จ', 'รถบรรทุกรถ ยนต์ได้ 1 คัน(Slide)',
            'รถบรรทุกรถยนต์ได้ 4-8 คัน', 'รถบรรทุกเฉพาะกิจ'

        ];

        foreach ($data as $data_carstyle) {
            $carstyle = new Carstyle();
            $carstyle->name = $data_carstyle;
            $carstyle->save();
        }
    }
}
