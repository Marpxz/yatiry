<?php

namespace Yatiry;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'level', 'letter', 'college_id'
    ];
    public function college()
    {
        return $this->belongsTo(College::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function getFullNameAttribute()
    {
        return $this->level . ' ' . $this->letter;
    }
}
