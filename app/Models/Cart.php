<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'adult',
        'user_id',
        'children',
        'check_in_date',
        'check_out_date',
    ];
}
