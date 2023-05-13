<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['text', 'movie_id', 'user_id'];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function likes()
    {
    return $this->morphMany(Like::class, 'likeable');
    }

    public function dislikes()
    {
    return $this->morphMany(Dislike::class, 'dislikeable');
    }
}
