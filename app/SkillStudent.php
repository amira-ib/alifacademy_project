<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkillStudent extends Model
{
    protected $fillable = [
        'student_id',
        'skill_id',
        'score'
    ];
    protected $table='skill_student';
}
