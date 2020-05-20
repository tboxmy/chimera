<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;
use App\Topic;

class Question extends Model
{
    //
    protected $fillable = [
        'topic_id', 'name', 'description','type','embed_link','image',
    ];
    public function AnswerMultiplechoice()
    {
        return $this->belongsTo('App\Question', 'question_id', 'id');
    }
    public function topics()
    {
        return $this->belongsTo('App\Topic', 'topic_id', 'id');
    }
    
}
