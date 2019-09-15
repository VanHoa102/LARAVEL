<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKindTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('kind', function (Blueprint $table) {
				$table->increments('id');
				$table->string('name');
				$table->string('path');
				$table->integer('total');
			});

		// Schema::create('file', function (Blueprint $table) {
		//      $table->increments('id');
		//      $table->string('name');
		//      $table->string('path');
		//      $table->integer('kind_id')->unsigned();
		//      $table->foreign('kind_id')->references('id')->on('kind')->onDelete('cascade');
		//  });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('kind');
	}
}
