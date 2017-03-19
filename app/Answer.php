<?php

namespace App;

use App\User;
use App\Event;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Answer extends Pivot
{
    public function userAnswers()
    {
        return $this->belongsTo('App\User')->with('answer');
    }
    public function event()
    {
        return $this->belongsTo('App\Event');
    }

}
