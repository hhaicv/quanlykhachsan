<?php

use App\Models\RoomType;
use App\Models\Service;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('room_type_service', function (Blueprint $table) {

            $table->foreignIdFor(RoomType::class)->constrained();
            $table->foreignIdFor(Service::class)->constrained();
 
            $table->primary(['room_type_id','service_id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_type_service');
    }
};
