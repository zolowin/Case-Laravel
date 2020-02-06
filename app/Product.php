<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable =
        ['product_id',
            'product_name',
            'product_chip',
            'product_ram',
            'product_battery',
            'product_screen',
            'product_camera_resolution',
            'product_price',
            'product_color',
            'product_image',
            'product_weight',
            'product_sim_slot',
            'product_guarantee',
            'product_operating_system',
            'product_origin',
            'product_year_made',
            'product_sku',
            'product_enable',
            'product_describes',
            'product_feature',
            'product_category_id',
        ];
    protected $primaryKey = 'product_id';

    public function category(){
        return $this->belongsTo('App\Category', 'product_category_id');
    }
}
