<?php

namespace Yatiry;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name', 'lastname', 'email', 'password', 'user_type', 'college_id', 'course_id', 'avatar', 'active', 'activation_token'
    ];


    protected $hidden = [
        'password', 'remember_token', 'activation_token'
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function college()
    {
        return $this->belongsTo(College::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function scoreboard()
    {
        return $this->hasOne(Scoreboard::class);
    }
}
