<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'price',
        'product_id',
        'user_id',
    ];
    public $timestamps = false;

    public function user()
    {
        return $this ->belongsTo(User::class);
    }

    public function product()
    {
        return $this ->belongsTo(Product::class);
    }

    public static function getBasket()
    {
        return auth()->user()->basket();

    }

    public static function getProductById($id)
    {
        return self::getBasket()->where('product_id', $id)->first();
    }

    public function getSummaryAttribute()
    {
//        dd($this->amount);
        return $this->product->price * $this->amount;
    }

    public static function getPrice()
    {
        $sum = 0;

        foreach (self::getBasket()->get() as $product)
        {
            $sum = $sum + $product->price;
        }

        return $sum;
    }

    public static function getAmount()
    {
        $amount = 0;

        foreach (self::getBasket()->get() as $product)
        {
            $amount = $amount + $product->amount;
        }

        return $amount;
    }
}
