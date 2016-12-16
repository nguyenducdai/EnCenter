<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TintucTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('Tintuc', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Title');
            $table->text('Descation');
            $table->text('Content');
            $table->string('Image');
            $table->integer('Status');
            $table->string('MetaTitle');
            $table->string('MetaDescation');
            $table->string('MetaKeyword');
            $table->integer('danhmuc_id')->unsigned();
            $table->foreign('danhmuc_id')->references('id')->on('danhmuc')->onDelete('cascade');
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
        //
    }
}
