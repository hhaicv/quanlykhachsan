<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('promotions')->insert([
            'name'=>'M1',
            'description'=>'Khuyến mãi tháng 7',
            'discount_rate'=>'50000',
            'start_date'=>'2024-07-17',
            'end_date'=>'2024-07-27',
        ]);
    }
}
