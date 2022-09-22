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
        return $this->hasMany(Phrase::class);
    }
}