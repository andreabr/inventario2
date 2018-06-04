<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateComputersTable.
 */
class CreateComputersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('computers', function(Blueprint $table) {
			$table->increments('id');
			
			$table->string('user', 20);
			$table->unsignedInteger('sector_id');
			$table->string('manufacturer', 50);
			$table->string('model', 50);
			$table->string('serial_number', 50);
			$table->string('bmp_number', 20)->nullable();
			$table->string('operacional_system', 15);
			$table->enum('sys_op_architecture', ['x86', 'x64']);
			$table->string('hard_disk_capacity', 10);
			$table->string('memory_capacity', 10);
			$table->string('processor', 20);
			$table->string('licensed', 3);
			$table->string('network_name', 10)->nullable();
			$table->string('ip_address', 15)->nullable();

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
		Schema::drop('computers');

		$table->dropForeign('computers_sectors_id_foreign');
	}
}
