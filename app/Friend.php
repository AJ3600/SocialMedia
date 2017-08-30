<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    public function user1() {
        return $this->belongsTo('App\User', 'user_id_1');
    }
    public function user2() {
        return $this->belongsTo('App\User', 'user_id_2');
    }
    public function posts() {
        return $this->belongsToMany('App\Post');
    }
}
