<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'skill_name'
    ];

    public function projects() {
        return $this->belongsToMany(Project::class);
    }

    public function students(){
        return $this->belongsToMany(Student::class)->withPivot(['score', 'id']);
    }
}
