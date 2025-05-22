<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'hours',
        'subject_id'
    ];

    public function teachers()
    {
        return $this->belongsToMany(User::class, 'course_teacher', 'course_id', 'teacher_id');
    }

    public function lesson()
    {
        return $this->hasMany(Lesson::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
