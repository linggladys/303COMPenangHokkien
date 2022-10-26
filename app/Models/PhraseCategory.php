<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhraseCategory extends Model
{
    use HasFactory;

    protected $table = 'phrase_categories';

    public $timestamps = false;

    public function phrases()
    {
        return $this->hasMany(Phrase::class, "phrase_category_id");
    }

    public function questions()
    {
        return $this->hasMany(QuizQuestion::class)->limit(10);
    }

    public function userResult()
    {
        return $this->hasOne(QuizResult::class)->where('user_id',auth()->user()->id);
    }
}
