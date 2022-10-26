<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    use HasFactory;

    protected $table = "quiz_results";

    protected $fillable = [
        'user_id',
        'phrase_category_id',
        'points',
        'correct_answers',
        'wrong_answers'
    ];

}
