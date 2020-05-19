<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Quiz;
use App\Question;

use App\Permissions\HasPermissionsTrait;

class User extends Authenticatable
{
    use Notifiable, HasPermissionsTrait;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function isAdmin(){
        return $this->is_admin;
    }

    public function quizzes()
    {
        return $this->belongsToMany('App\Quiz', 'users_quizzes', )
        ->withPivot( 'question_id', 'result')
        ->withTimestamps();
    }
    

    
}
