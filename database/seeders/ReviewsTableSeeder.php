<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 50; $i += 1) {
            for ($j = 1; $j <= 5; $j += 1) {
                Review::create([
                    'content' => 'レビュー',
                    'star' => rand(1,5),
                    'restaurant_id' => $i,
                    'user_id' => 1,
                    ]);       
                }
            }
    }
}
