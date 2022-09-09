<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model 
{
    use HasFactory;
    // use Sluggable;
    protected $fillable = [
        'name',
        'image',
        'quantity',
        'price',
        // 'slug',
        'detail'
    ];


    // public function sluggable()
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'name'
    //         ]
    //     ];
    // }
}


