<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    use HasFactory;

    protected $table = "quiz_questions";

    protected $fillable = [
        'phrase_category_id',
        'answer1',
        'answer2',
        'answer3',
        'question',
        'correct_answer',
    ];

    public function answer1Option()
    {
        return $this->belongsTo(Phrase::class,"answer1");
    }

    public function answer2Option()
    {
        return $this->belongsTo(Phrase::class,"answer2");
    }

    public function answer3Option()
    {
        return $this->belongsTo(Phrase::class,"answer3");
    }

    public function user_answer()
    {
        return $this->hasOne(QuizAnswer::class)->where('user_id',auth()->user()->id)->latest();
    }

    public function questionDetail()
    {
        return $this->belongsTo(Phrase::class,"question");
    }

}
