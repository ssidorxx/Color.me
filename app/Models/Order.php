<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'status_id',
        'total_price',
        'user_id',
        'amount',
        'comment'
    ];

    public function contents(){
        return $this->hasMany(Order_content::class);
    }

//    public function products(){
//        return $this->belongsToMany(Product::class);
//    }
    public function status(){
        return $this->belongsTo(Status::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orderContent()
    {
        return $this->hasMany(Order_content::class);
    }

}
