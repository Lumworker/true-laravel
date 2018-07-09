<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
//cmd คำสั่ง "php artisan migrate" เพื่อเช็คและสร้าง ข้อมูลmigrationไฟล์ ที่ ในtableยังไม่มี
//cmd คำสั่ง "php artisan migrate:refresh" เพื่อสร้าง table
//php  artisan migrate:refresh --seed เฟชรและยิงซีดใหม่
//คำสั่งrun seedอยุ่หน้า29เป็นต้นไป
class CreateUsersTable extends Migration
{
    public function up()
    {
        
        //มาจากหน้า27
        Schema::create('users', function (Blueprint $table) { //สร้าง table ชื่อ users และมีค่าตามค่าด้านล่าง
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('age')->default(0);
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('mobile')->nullable();
            $table->integer('active')->default(1);
            $table->string('api_token', 60)->unique()->nullable();//uniqueคือห้ามซ้ำ ->nullable คือสามารถเป็นค่าว่างได้
            $table->rememberToken();
            $table->timestamps();
             // Schema::create('users', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('name');
        //     $table->string('email')->unique();
        //     $table->string('password');
        //     $table->rememberToken();
        //     $table->timestamps();
        // });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
