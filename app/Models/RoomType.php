<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'cover',
        'description',
        'maxOccupancy',
        'is_active',
    ];

    protected $casts = [
        'is_active'=>'boolean',
    ];
}
