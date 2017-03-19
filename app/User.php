<?php

namespace App;

//use Illuminate\Notifications\Notifiable;
//use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model as Eloquent;

use App\Event;
class User extends Eloquent
{




//    protected $fillable = [
//        'name', 'surname', 'email', 'telephone'];
//
    public function events()
    {
        return $this->belongsToMany('App\Event', 'answers')->withPivot('id','user_id, event_id, message')->withTimestamps();
    }



//    public function newPivot(Eloquent $parent, array $attributes, $table, $exists, $using = NULL) {
//        if ($parent instanceof Event) {
//            return new Answer($parent, $attributes, $table, $exists,  $using = NULL);
//        }
//        return parent::newPivot($parent, $attributes, $table, $exists,  $using = NULL);
//    }


}
