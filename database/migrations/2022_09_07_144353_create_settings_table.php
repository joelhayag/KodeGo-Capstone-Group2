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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('app_name')->default('ALPRESKO');
            $table->string('app_email')->default('ALPRESKO@gmail.com');
            $table->string('app_mobile')->default('+6390000000000');
            $table->string('app_open_time')->default('24/7');
            $table->string('app_map_url')->default('');
            $table->string('app_address')->default('Manila');
            $table->integer('app_shipping_fee')->default('50');
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
        Schema::dropIfExists('settings');
    }
};
