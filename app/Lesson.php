<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //
    public function practice()
    {
        return $this->hasMany('App\Practice');
    }
}
