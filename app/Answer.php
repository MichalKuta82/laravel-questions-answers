<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    protected $fillable = [
    	'content'
    ];

    public function question()
    {
    	return $this->belongsTo('App\Question');
    }
}
