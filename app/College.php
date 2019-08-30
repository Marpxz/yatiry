<?php

namespace Yatiry;

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
    public function scoreboards()
    {
        return $this->hasMany(Scoreboard::class);
    }
}
