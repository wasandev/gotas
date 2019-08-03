<?php


use Illuminate\Database\Seeder;
use App\Models\Tenant\Category;


class CategoriesTableSeeder extends Seeder
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

        $data = ['สินค้าทั่วไป', 'ผลิตผลทางการเกษตร', 'อาหาร', 'วัสดุก่อสร้าง', 'วัตถุอันตราย'];

        foreach ($data as $data_category) {
            $category = new Category();
            $category->name = $data_category;
            $category->save();
        }
    }
}
