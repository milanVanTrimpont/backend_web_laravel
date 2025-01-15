<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Faq;


class Categorie extends Model
{
    use HasFactory;

    protected $table = 'categorieën';

    protected $fillable = ['naam'];

    public function faqs()
    {
        return $this->hasMany(Faq::class, 'categorie_id');
    }
}
