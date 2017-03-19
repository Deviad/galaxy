<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Field extends Eloquent
{
//    public function events()
//    {
//        return $this->belongsToMany('App\Event');
//    }

    public function events()
    {
        return $this->belongsToMany('App\Event', 'answers')->withPivot('user_id, event_id, message')->withTimestamps();
    }

}
