<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
//เป็นคลาสแม่ที่สืบทอดไปยัง model อื่น
class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    //ฟังชั่น shop คือให้ ไฟล์User.phpนี้ นำApp\Model\Shop.php มาจอยเข้าuser 
    //(สั่งให้userรู้จักTable shopเวลาเรียกsqlสามารถเรียกjoinด้วยกันได้)
    public function shop()
    {
        return $this->hasOne('App\Model\Shop');//hasOneคือคำสั่ง join
    }

    public function generateToken()
    {
        $this->api_token = str_random(60);
        $this->save();

        return $this->api_token;
    }

}
