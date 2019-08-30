<?php

namespace Yatiry;

use Illuminate\Database\Eloquent\Model;

class Scoreboard extends Model
{
    protected $fillable = [
        'user_id', 'score', 'college_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function college()
    {
        return $this->belongsTo(College::class);
    }
}
