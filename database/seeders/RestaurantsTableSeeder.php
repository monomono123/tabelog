<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 50; $i += 1) {
            Restaurant::create([
             'name' => '店舗名'. $i,
             'category_id' => $i%5 + 1,
             'image' => 'dammy.png',
             'discription' => '説明文'. $i,
             'priceupper' => 10000,
             'pricelower' => 1000,
             'time' => '営業時間'. $i,
             'holiday' => '定休日'. $i,
             'postcode' => '郵便番号'. $i,
             'address' => '住所'. $i,
             'telephone' => '電話番号'. $i,
             'payment' => '支払い方法'. $i,
             ]);
            }
    }
}
