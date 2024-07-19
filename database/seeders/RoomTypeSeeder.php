<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('room_types')->insert([
            'name' => 'LUXURY ROOM',
            'cover' => 'room_types/OdvhhdTutw64Isdhn6ZanKXudCcXGyxlnIfscRRP.jpg',
            'description' => 'Nằm ở trung tâm Hà Nội với sự pha trộn độc đáo giữa di sản lịch
            sử và sang trọng đương đại, chỗ ở sang trọng, tiện nghi tuyệt vời, lòng hiếu khách chân thành và dịch vụ tận tâm để mang lại trải nghiệm cao cấp.',
            'maxOccupancy' => '4 người',
            'is_active' => '1',
        ]);
    }
}
