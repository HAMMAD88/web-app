<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = ['movie_name', 'director', 'year'];
    public function poster()
    {
        return $this->hasOne(Poster::class);
    }
    public function posts()
    {
    return $this->hasMany(Post::class);
    }
}
