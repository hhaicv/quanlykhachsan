<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class banner extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'image_url',
        'link_url',
        'start_date',
        'end_date',
    ];
}
