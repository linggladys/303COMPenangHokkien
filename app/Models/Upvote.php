<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upvote extends Model
{
    use HasFactory;

    protected $table = "upvotes";

    protected $fillable = [
        'user_id'
    ];

    public function memoryAid()
    {
        return $this->belongsTo(MemAid::class);
    }
}
