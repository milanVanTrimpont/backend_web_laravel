<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profielen';

    protected $fillable = ['user_id', 'gebruikersnaam', 'profielfoto', 'verjaardag', 'bio'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
