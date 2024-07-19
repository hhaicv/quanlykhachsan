<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomTag extends Model
{
    use HasFactory;
    protected $table = 'room_tags';
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
