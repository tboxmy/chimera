<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Topic;

class Quiz extends Model
{
    //
    protected $fillable = [
        'name', 'description', 'update_at',
    ];
    public function topics()
    {
        return $this->belongsToMany('App\Topic')->withTimestamps();;
        // return $this->belongsToMany('Topic::class');
        // return $this->belongsToMany('Topic','quiz_topic','quiz_id','topic_id');
    }
}
