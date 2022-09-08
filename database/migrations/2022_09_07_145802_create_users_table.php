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
        Schema::create('app_users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('mobile_number');
            $table->string('email_address');
            $table->string('password');
            $table->enum('privilege', ['admin', 'vendor', 'customer']);
            $table->string('other_notes');
            $table->string('address_country');
            $table->string('address_st');
            $table->string('address_others');
            $table->string('address_town');
            $table->string('address_state');
            $table->integer('address_code');
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
        Schema::dropIfExists('users');
    }
};
