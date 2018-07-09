<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    // public function products()//มาจากหน้า47 และนำไปเพิ่มในshop
    // {
    //     return $this->hasMany('App\Model\Product');
        
    // }
    public function shop()
    {
        return $this->belongsTo('App\Model\Shop');
    }


}
