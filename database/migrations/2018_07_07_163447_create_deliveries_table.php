<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status');
            $table->integer('order_id')->unsigned();  
            $table->integer('payment_id')->unsigned();
            $table->integer('messenger_id')->unsigned();
            $table->timestamps();

            $table->foreign('order_id')->references('id')
            ->on('orders')->onDelete('cascade');
            $table->foreign('messenger_id')->references('id')
            ->on('messengers')->onDelete('cascade');
            $table->foreign('payment_id')->references('id')
            ->on('payment')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deliveries');
    }
}
