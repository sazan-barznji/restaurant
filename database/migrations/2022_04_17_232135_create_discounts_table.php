<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('disc_name');
            $table->decimal('disc_value');
            $table->string('disc_code');
            $table->timestamps();
        });
     
    }
    public function down()
    {
        Schema::dropIfExists('discounts');
    }

};
