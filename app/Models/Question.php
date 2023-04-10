<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'answer',
        'status_id',
        'user_id'
    ];

    public $timestamps = false;

    public function scopeGetQuestions($query, $count=5)
    {
        return $query->take($count);
    }

    public function status()
    {
        return $this ->belongsTo(Status::class);
    }
}
