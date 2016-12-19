<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function avatar(){
    	return $this->hasOne('App\Avatar');
    }
}
