<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    protected $fillable = ['category_name', 'category_alias', 'category_status', 'p_category_id', 'category_enable'];

    public function product() {
        return $this->hasMany('App\Product', 'product_category_id','id');
    }
}
