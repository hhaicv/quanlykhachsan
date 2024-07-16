<?php

use App\Models\room;
use App\Models\Tag;
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
        Schema::create('room_tag', function (Blueprint $table) {
           $table->foreignIdFor(Tag::class)->constrained();
           $table->foreignIdFor(room::class)->constrained();

           $table->primary(['tag_id','room_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_tag');
    }
};
