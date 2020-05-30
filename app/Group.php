<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'group_name',
        'group_start',
        'group_end'
    ];

    public function students(){
        return $this->belongsToMany(Student::class);
    }
}
