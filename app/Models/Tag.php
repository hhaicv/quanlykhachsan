<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'description',
    ];

    public function rooms()
    {
        return $this->belongsToMany(room::class);
    }
}
