<?php


use Illuminate\Database\Seeder;
use App\Models\Tenant\Cartype;


class CartypesTableSeeder extends Seeder
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
            'รถกระบะ', 'รถหัวลาก', 'รถบรรทุก 4 ล้อ', 'รถบรรทุก 6 ล้อ',
            'รถบรรทุก 8 ล้อ', 'รถบรรทุก 10 ล้อ', 'รถบรรทุก 12 ล้อ',
            'รถหัวลาก 10 ล้อ', 'รถกึ่งพ่วง 8 ล้อ (2 เพลา)', 'รถกึ่งพ่วง 12 ล้อ (3 เพลา)',
            'รถพ่วง 2 ล้อ (1 เพลา)', 'รถพ่วง 4 ล้อ (1 เพลา)', 'รถพ่วง 4 ล้อ (2 เพลา)',
            'รถพ่วง 6 ล้อ (2 เพลา)', 'รถพ่วง 8 ล้อ (2 เพลา)', 'รถพ่วง 12 ล้อ (3 เพลา)',
            'รถบัส 4 ล้อ', 'รถบัส 6 ล้อ', 'รถบัส 2 ชั้น 8 ล้อ', 'รถจักรยานยนต์'
        ];

        foreach ($data as $data_cartype) {
            $cartype = new Cartype();
            $cartype->name = $data_cartype;
            $cartype->save();
        }
    }
}
