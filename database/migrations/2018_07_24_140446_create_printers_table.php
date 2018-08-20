<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrintersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('printers', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('sector_id');
            $table->string('type', 30);
            $table->string('manufacturer', 50);
            $table->string('model', 50);
            $table->string('serial_number', 50)->nullable();
            $table->string('bmp_number', 20)->nullable();
            $table->string('ip_address', 15)->nullable();
            $table->string('tonner', 20)->nullable();
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
        Schema::table('printers', function (Blueprint $table) {
            $table->dropForeign('printers_sector_id_foreign');
        });
        Schema::dropIfExists('printers');
    }
}
