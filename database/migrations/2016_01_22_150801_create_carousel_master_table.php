<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarouselMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('carousel_master', function (Blueprint $table) {
          $table->increments('id');
          $table->string('file_path');
          $table->string('client_name');
          $table->string('description');
          $table->string('text1');
          $table->string('text2');
          $table->date('date');          
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
        Schema::drop('carousel_master');
    }
}
