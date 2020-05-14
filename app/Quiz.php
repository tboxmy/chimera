<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Topic;

class Quiz extends Model
{
    //
    protected $fillable = [
        'id','name', 'description', 'publish_start', 'update_at',
    ];
    protected $casts = [
        'publish_start' => 'date'
    ];
    protected $publish_start = ['date'];
    
    // protected $casts = [
    //     'publish_start' => 'date:hh:mm'
    // ];
    public function topics()
    {
        return $this->belongsToMany('App\Topic')->withTimestamps();;
        // return $this->belongsToMany('Topic::class');
        // return $this->belongsToMany('Topic','quiz_topic','quiz_id','topic_id');
    }
}
