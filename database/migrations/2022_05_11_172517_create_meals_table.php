<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('meals')){
            Schema::create('meals', function (Blueprint $table) {
             $table->increments('id');
             $table->string('photo');
             $table->string('title');
             $table->decimal('price');
             $table->longText('ingr');
             $table->integer('time')->default('0');
             $table->Integer('rest_id')->nullable()->unsigned();
             $table->Integer('cate_id')->unsigned(); 
             $table->timestamps();
             $table->foreign('rest_id')->references('id')->on('restaurants')->ondelete('cascade');
             $table->foreign('cate_id')->references('id')->on('categories')->ondelete('cascade');
            });  
         } 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meals');
    }
};
