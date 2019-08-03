<?php


use Illuminate\Database\Seeder;
use App\Models\Tenant\Tiretype;


class TiretypesTableSeeder extends Seeder
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
            '10 ล้อ 3 เพลา', '12 ล้อ 3 เพลา', '12 ล้อ 4 เพลา',
            '2 ล้อ 1 เพลา', '4 ล้อ', '4 ล้อ 1 เพลา', '4 ล้อ 2 เพลา', '6 ล้อ 2 เพลา',
            '6 ล้อ 3 เพลา', '8 ล้อ 2 เพลา', '8 ล้อ 3 เพลา'
        ];

        foreach ($data as $data_tiretype) {
            $tiretype = new Tiretype();
            $tiretype->name = $data_tiretype;
            $tiretype->save();
        }
    }
}
