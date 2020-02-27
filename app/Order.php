<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public function product(){
        return $this->belongsTo('App\Product', 'or_product_id');
    }

    public function transaction(){
        return $this->belongsTo('App\Transaction', 'or_transaction_id');
    }
}
