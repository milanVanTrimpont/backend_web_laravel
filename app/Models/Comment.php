<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{

    use HasFactory;

    protected $fillable = ['user_id', 'kleding_item_id', 'body'];

public function kledingItem()
{
    return $this->belongsTo(KledingItem::class);
}


public function user()
{
    return $this->belongsTo(User::class);
}
}
