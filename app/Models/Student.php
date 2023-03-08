<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public function Department()
    {
        return $this->belongsTo(App\Models\Department::class);
    }
    public function Course(){
        return $this->belongsTo(App\Models\Course::class);
    }
}
