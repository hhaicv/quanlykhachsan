<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('banners')->insert([
            'name'=>'khuyến mãi 10% mùa du lịch',
            'image_url'=>'banners/kM3sr5cwgz2sFVhEEL7ZX13ofFk6ZZ05WIHdTh0d.webp',
            'link_url'=>'http://quanlykhachsan.test/admin/banners',
            'start_date'=>'	2024-07-17',
            'end_date'=>'2024-07-21',
        ]);
    }
}
