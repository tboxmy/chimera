<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;
use App\Topic;

class Topic extends Model
{
    //
    protected $fillable = [
        'name', 'description','updated_at',
    ];
    // public function quizzes()
    // {
    //     return $this->belongsToMany(Quiz::class, 'quiz_id');
    // }
    public function quizzes()
    {
        return $this->belongsToMany('Quiz');
        // return $this->belongsToMany('Quiz','quiz_topic','quiz_id','topic_id');
    }
    
}
