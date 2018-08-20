<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sector_id');

            $table->string('manufacturer', 50);
            $table->string('model', 50);
            $table->string('screen_size');
            $table->string('serial_number', 50)->nullable();
            $table->string('bmp_number', 50)->nullable();
            $table->smallInteger('year_acquisition')->nullable();
            $table->string('status', 30);

            $table->foreign('sector_id')->references('id')->on('sectors');

            $table->softDeletesTz();
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('monitors', function (Blueprint $table) {
            $table->dropForeign('monitors_sector_id_foreign');
        });
        
        Schema::dropIfExists('monitors');
    }
}
