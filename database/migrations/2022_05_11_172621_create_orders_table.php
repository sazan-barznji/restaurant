<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
    {
        if(!Schema::hasTable('orders')){
            Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('disc_id')->nullable()->unsigned();
            $table->Integer('meal_id')->unsigned();
            $table->decimal('total_price');
            $table->integer('total_time'); 
            $table->integer('quantity');
            $table->integer('service');
            $table->integer('table_num');
            $table->timestamps();
            $table->foreign('disc_id')->references('id')->on('discounts')->ondelete('cascade');
            $table->foreign('meal_id')->references('id')->on('meals')->ondelete('cascade');
            
        }); 
        }
       
    }


    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
