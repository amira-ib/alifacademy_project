<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'nickname',
        'birthday',
        'number',
        'email',
        'telegram',
        'about'
    ];

    public function groups(){
        return $this->belongsToMany(Group::class);
    }

    public function projects(){
        return $this->belongsToMany(Project::class);
    }

    public function skills(){
        return $this->belongsToMany(Skill::class)->withPivot(['score', 'id']);
    }
}
