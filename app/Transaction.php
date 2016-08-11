<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
      //
     public function site()
    {
    	return $this->belongsTo('App\Site');
    }

     public function user()
    {
    	return $this->belongsTo('App\User');
    }

     public function client()
    {
    	return $this->belongsTo('App\Client');
    }
}
