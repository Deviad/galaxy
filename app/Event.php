<?php

namespace App;


use Illuminate\Database\Eloquent\Model as Eloquent;
use App\User;


class Event extends Eloquent
{
    public function fields()
    {
        return $this->hasMany('App\Field');
    }
    public function users()
    {
        return $this->hasMany('App\User');
    }
    public function answers()
    {
        return $this->belongsToMany('App\User', 'answers')->withPivot('user_id, event_id, message')->withTimestamps();
    }

}
