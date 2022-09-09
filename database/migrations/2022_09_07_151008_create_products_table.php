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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_thumbnail');

            $table->string('product_desc');
            $table->integer('product_price');
            $table->float('product_weight');
            $table->integer('product_quantity');

            $table->unsignedBigInteger('product_department_id');
            $table->foreign('product_department_id')->references('id')->on('departments');

            $table->unsignedBigInteger('product_category_id');
            $table->foreign('product_category_id')->references('id')->on('categories');

            $table->unsignedBigInteger('product_vendor_id');
            $table->foreign('product_vendor_id')->references('id')->on('app_users');

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
        Schema::dropIfExists('products');
    }
};
