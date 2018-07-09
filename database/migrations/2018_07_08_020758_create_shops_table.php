<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            //integerคือ user คือฟิวที่เป็น relation กับ users สังเกตว่า ทาง framwork จะรู้จักกันผ่านทางชื่อเลยว่า usersเป็นแม่
            //และ _idคือที่เทเบิลตำแหน่ง idของ table user
            $table->string('name');
            $table->string('desc');
            $table->timestamps();
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop');
    }
}
