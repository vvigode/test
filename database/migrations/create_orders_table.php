<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('phone');
            $table->string('fio');
            $table->double('summ', 8, 2);
            $table->string('address');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::drop('orders');
    }
}
