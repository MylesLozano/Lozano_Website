<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'seller_id', // Add this if your products table has a seller_id column
    ];

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function seller()
    {
        return $this->belongsTo('App\Seller');
    }
}
