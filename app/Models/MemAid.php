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

    public function upvotedBy(User $user)
    {
        // return if this memAid is liked by the user
        return $this->upvotes->contains('user_id',$user->id);
    }

    public function phrase()
    {
        return $this->belongsTo(Phrase::class,'phrase_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function upvotes()
    {
        return $this->hasMany(Upvote::class);
    }
}
