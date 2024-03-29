<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dislike extends Model
{
use HasFactory;
protected $fillable = ['dislikeable_id', 'dislikeable_type', 'user_id'];
public function dislikeable()
{
    return $this->morphTo();
}
public function user()
{
    return $this->belongsTo(User::class);
}


}
