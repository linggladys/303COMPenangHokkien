<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phrase extends Model
{
    use HasFactory;

    protected $table = "phrases";

    protected $primaryKey = "id";

    public $timestamps = false;

    // custom function
    public function likedBy(User $user)
    {
        // Laravel collection method
        return $this->likes->contains('user_id',$user->id);
    }

    public function phraseCategory()
    {
        return $this->belongsTo(PhraseCategory::class);
    }

    // a phrase can contain many likes
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function memoryAid()
    {
        return $this->hasMany(MemAid::class);
    }
}
