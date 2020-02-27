<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = ['tr_user_name', 'tr_status', 'tr_address', 'tr_city', 'tr_phone', 'tr_note'];

    public function user(){
        return $this->belongsTo('App\User', 'tr_user_id', 'tr_user_id');
    }

    public function orders(){
        return $this->hasMany('App\Order', 'or_transaction_id');
    }
}
