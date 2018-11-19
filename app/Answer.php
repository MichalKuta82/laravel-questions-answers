<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    protected $fillable = [
    	'content', 'user_id', 'question_id'
    ];

    public function question()
    {
    	return $this->belongsTo('App\Question');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
