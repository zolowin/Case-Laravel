<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function orders(){
        return $this->hasMany('App\Order');
    }
}
