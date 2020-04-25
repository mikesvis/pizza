<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderPriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_price', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('price_id');
            $table->string('title');
            $table->float('price', 8, 2);
            $table->unsignedInteger('quantity');

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('price_id')->references('id')->on('prices')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_price');
    }
}
