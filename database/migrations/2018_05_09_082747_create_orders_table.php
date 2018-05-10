<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('receiverName');
            $table->integer('receiverPhone');
            $table->string('deliveryAddress');
            $table->string('city')->nullable();
            $table->string('nameOnCard')->nullable();
            $table->integer('cardNumber')->nullable();
            $table->date('dateExpCard')->nullable();
            $table->integer('totalPrice');
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
        Schema::dropIfExists('orders');
    }
}
