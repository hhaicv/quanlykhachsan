<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'quantity',
        'size',
        'view',
        'bed',
        'max_people',
        'cover',
        'images',
        'price',
        'content',
        'status',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
