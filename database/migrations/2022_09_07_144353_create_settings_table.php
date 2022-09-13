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
            $table->longText('app_map_url');
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
                'app_map_url' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61776.70117306748!2d120.94454003474515!3d14.596578752415198!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397ca03571ec38b%3A0x69d1d5751069c11f!2sManila%2C%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1663059028153!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
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
