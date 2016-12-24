<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHocvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('hocvien', function (Blueprint $table) {
             $table->increments('id');
             $table->string('name');
             $table->string('email');
             $table->string('address');
             $table->datetime('date');
             $table->integer('phone');
             $table->string('job');
             $table->text('note');
             $table->integer("idKhoahoc");
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
           Schema::dropIfExists('hocvien');
    }
}
