<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePizzaVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizza_variants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('crust_id');
            $table->unsignedBigInteger('pizza_id');
            $table->unsignedBigInteger('size_id');
            $table->string('title');
            $table->string('weight');
            $table->timestamps();

            // to crust
            $table->foreign('crust_id')
                ->references('id')->on('crusts')
                ->onDelete('cascade');

            // to pizza
            $table->foreign('pizza_id')
                ->references('id')->on('pizzas')
                ->onDelete('cascade');

            // to size
            $table->foreign('size_id')
                ->references('id')->on('sizes')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pizza_variants');
    }
}
