<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        "model",
        'price',
        'image',
        'description',
        "image_path",
        "visits_count"

    ];
    protected $hidden = [

    ];
}

