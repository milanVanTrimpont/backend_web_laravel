<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = ['categorie_id', 'vraag', 'antwoord'];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }
}
