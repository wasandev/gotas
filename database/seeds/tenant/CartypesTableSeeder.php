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
            ['name' => 'รถจักรยานยนต์', 'payload' => 60],
            ['name' => 'รถกระบะ', 'payload' => 1500],
            ['name' => 'รถบรรทุก 4 ล้อ', 'payload' => 9500],
            ['name' => 'รถบรรทุก 6 ล้อ', 'payload' => 15000],
            ['name' => 'รถบรรทุก 10 ล้อ', 'payload' => 25000],
            ['name' => 'รถบรรทุก 12 ล้อ', 'payload' => 30000],
            ['name' => 'รถกึ่งพ่วง 10 ล้อ (รถหัวลาก 6 ล้อ+รถกึ่งพ่วง 4 ล้อ)', 'payload' => 26000],
            ['name' => 'รถกึ่งพ่วง 14 ล้อ (รถหัวลาก 6 ล้อ+รถกึ่งพ่วง 8 ล้อ)', 'payload' => 35000],
            ['name' => 'รถกึ่งพ่วง 18 ล้อ (รถหัวลาก 10 ล้อ+รถกึ่งพ่วง 8 ล้อ)', 'payload' => 45000],
            ['name' => 'รถกึ่งพ่วง 22 ล้อ (รถหัวลาก 10 ล้อ+รถกึ่งพ่วง 12 ล้อ)', 'payload' => 50500],
            ['name' => 'รถพ่วง 18 ล้อ (รถบรรทุก 10 + รถพ่วง 8 ล้อ)', 'payload' => 47000],
            ['name' => 'รถพ่วง 20 ล้อ (รถบรรทุก 12 + รถพ่วง 8 ล้อ)', 'payload' => 50500],
            ['name' => 'รถพ่วง 22 ล้อ (รถบรรทุก 10 + รถพ่วง 12 ล้อ)', 'payload' => 50500],
            ['name' => 'รถพ่วง 24 ล้อ (รถบรรทุก 12 + รถพ่วง 12 ล้อ)', 'payload' => 50500],
        ];

        foreach ($data as $data_cartype) {

            $cartype = new Cartype();
            $cartype->name = $data_cartype['name'];
            $cartype->payload = $data_cartype['payload'];
            $cartype->save();
        }
    }
}
