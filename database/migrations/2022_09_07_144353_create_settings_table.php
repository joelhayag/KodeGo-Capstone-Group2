<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


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
            $table->string('app_name');
            $table->string('app_email');
            $table->string('app_mobile');
            $table->string('app_open_time');
            $table->string('app_map_url');
            $table->string('app_address');
            $table->integer('app_shipping_fee');
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('settings')->insert(
            array(
                'app_name' => 'ALPRESKO',
                'app_email' => 'ALPRESKO@gmail.com',
                'app_mobile' => '+6390000000000',
                'app_open_time' => '24/7',
                'app_map_url' => '',
                'app_address' => 'Manila',
                'app_shipping_fee' => '50'
            )
        );
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
