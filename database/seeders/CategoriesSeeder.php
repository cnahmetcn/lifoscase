<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['cat_id' => 1, 'cat_name' => 'Market'],
            ['cat_id' => 2, 'cat_name' => 'Online Alışveriş'],
            ['cat_id' => 3, 'cat_name' => 'Oyun'],
            ['cat_id' => 4, 'cat_name' => 'Giyim'],
            ['cat_id' => 5, 'cat_name' => 'Yiyecek - İçecek'],
            ['cat_id' => 6, 'cat_name' => 'Sosyal Medya'],
            ['cat_id' => 7, 'cat_name' => 'Sağlık'],
            ['cat_id' => 8, 'cat_name' => 'Hizmet'],
            ['cat_id' => 9, 'cat_name' => 'Mobilya'],
            ['cat_id' => 10, 'cat_name' => 'Kitap - Kırtasiye'],
            ['cat_id' => 11, 'cat_name' => 'Tatil'],
            ['cat_id' => 12, 'cat_name' => 'Diğer']
        ]);
    }
}
