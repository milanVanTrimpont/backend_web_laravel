<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NieuwsItem extends Model
{
    use HasFactory;

    protected $fillable = ['titel', 'foto', 'content'];
    public $timestamps = true;
}
