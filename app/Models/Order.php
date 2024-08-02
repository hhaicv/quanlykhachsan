<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'room_id',
        'promotion_id',
        'name',
        'address',
        'email',
        'phone',
        'note',
        'check_in_date',
        'check_out_date',
        'adults',
        'children',
        'new_total_price',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function room() {
        return $this->belongsTo(Room::class);
    }

    public function payments() {
        return $this->hasMany(Payment::class);
    }
}
