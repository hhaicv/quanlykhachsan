<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'user_id',
        'promotion_id',
        'check_in_date',
        'check_out_date',
        'adult',
        'children',
        'name',
        'address',
        'email',
        'phone',
        'note',
        'new_total_price',
    ];
}
