<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    //โค้ดหน้า43
    public function user()
    {
        return $this->belongsTo('App\User');//belongsTo คือหาเจ้าของ หรือ จากลูกไปหาแม่
    }

    public function Products()
    {
        return $this->hasMany('App\Model\Product');//แบบ One to Many
    }

}
