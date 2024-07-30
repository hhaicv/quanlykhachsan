<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'discount_rate',
        'start_date',
        'end_date'
    ];
    public static function isValid($id)
    {
        return self::where('id', $id)
                    ->where('end_date', '>=', now())
                    ->first();
    }

}
