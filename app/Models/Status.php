<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function questions(){
        return $this->hasMany(Question::class);
    }

    public static function statusesQuestion()
    {
        return Status::whereIn('id', [1, 4, 5]);
    }
    public static function statusesOrder()
    {
        return Status::whereIn('id', [1, 2, 3]);
    }
}
