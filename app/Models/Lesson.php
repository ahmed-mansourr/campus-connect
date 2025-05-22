<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'title',
        'course_id',
    ];

    public function quiz()
    {
        return $this->hasOne(Quiz::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}
