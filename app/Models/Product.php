<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'count',
        'price',
        'photo',
        'description',
        'brand_id',
        'category_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public static function InStock()
    {
        return Product::where('count','>',0);
    }

    public function scopeGetItemsInStock($query, $count=5)
    {
        return $query->where('count','>',0)->take($count);
    }
}
