<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'room_number',
        'cover',
        'images',
        'price',
        'content',
        'room_type_id',
        'status',
    ];

    public function room_type(){
        return $this->belongsTo(RoomType::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }


}
