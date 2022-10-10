<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemAid extends Model
{
    use HasFactory;

    protected $table = "mem_aids";

    protected $fillable = [
        "memory_aid_content",
        "user_id",
        "phrase_id"
    ];

    public function phrase()
    {
        return $this->belongsTo(Phrase::class,'phrase_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
