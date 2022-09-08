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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('order_quantity');

            $table->unsignedBigInteger('order_product_id');
            $table->foreign('order_product_id')->references('id')->on('products');

            $table->unsignedBigInteger('order_customer_id');
            $table->foreign('order_customer_id')->references('id')->on('app_users');

            $table->integer('order_delivery_date');
            $table->enum('order_order_status', ['received', 'preparing', 'on the way', 'delivered']);

            $table->unsignedBigInteger('order_courier_id');
            $table->foreign('order_courier_id')->references('id')->on('couriers');

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
};
