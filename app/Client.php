<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    
     public function users()
    {
        return $this->hasMany('App\User');
    }

     public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }
}
