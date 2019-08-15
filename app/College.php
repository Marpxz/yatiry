<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    public $table = "colleges";
    protected $fillable = [
        'name',
    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
