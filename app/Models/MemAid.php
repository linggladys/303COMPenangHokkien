<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemAid extends Model
{
    use HasFactory;

    protected $table = "mem_aids";

    public function phrase()
    {
        return $this->belongsTo(Phrase::class,'phrase_id');
    }
}
