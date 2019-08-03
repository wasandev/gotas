<?php


use Illuminate\Database\Seeder;
use App\Models\Tenant\Driving_license_type;


class DrivingLicenseTypesTableSeeder extends Seeder
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
            'ใบอนุญาต (ท.1)', 'ใบอนุญาตขับรถยนต์สาธารณะ',
            'ใบอนุญาต (ท.2)', 'ใบอนุญาต (ท.3)', 'ใบอนุญาต (ท.4)',
            'ใบอนุญาตขับรถยนต์ส่วนบุคคล', 'ใบอนุญาตขับรถจักรยานยนต์ส่วนบุคคล'
        ];

        foreach ($data as $data_drivinglicensetype) {
            $drivinglicensetype = new Driving_license_type();
            $drivinglicensetype->name = $data_drivinglicensetype;
            $drivinglicensetype->save();
        }
    }
}
