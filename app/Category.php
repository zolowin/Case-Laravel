<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    protected $fillable = ['category_name', 'category_alias', 'category_status', 'p_category_id'];

    public function product() {
        return $this->hasMany('App\Product');
    }
}
