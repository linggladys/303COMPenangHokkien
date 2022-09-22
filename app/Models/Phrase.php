<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phrase extends Model
{
    use HasFactory;

    protected $table = 'phrases';

    public $timestamps = false;

    public function phraseCategory()
    {
        return $this->belongsTo(PhraseCategory::class);
    }
}
