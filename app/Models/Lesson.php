<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'title',
        'subject_id',
    ];

    public function quiz()
    {
        return $this->hasOne(Quiz::class);
    }
}
