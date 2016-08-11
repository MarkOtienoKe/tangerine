<?php

namespace App;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    public function sites()
    {
    	return $this->hasMany('App\Site');
    }

     public function client()
    {
    	return $this->hasMany('App\Client');
    }

     public function transaction()
    {
    	return $this->hasMany('App\Transaction');
    }
}
