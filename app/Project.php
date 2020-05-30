<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'link',
        'description'
    ];

    public function skills() {
        return $this->belongsToMany(Skill::class);
    }

    public function students(){
        return $this->belongsToMany(Student::class);
    }
}
