<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitDatabase extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create("admins", function(Blueprint $table) {
			$table->increments("id");
			$table->string("name");
			$table->string("email");
			$table->timestamps();
		});
		Schema::create("doctors", function(Blueprint $table) {
			$table->increments("id");
			$table->string("name", 200);
			$table->string("email", 100);
			$table->string("phone", 30);
			$table->string("address");
			$table->string("education", 600);
			$table->timestamps();
		});
		Schema::create("medicines", function(Blueprint $table) {
			$table->increments("id");
			$table->string("name");
			$table->string("code");
			$table->string("company");
			$table->integer("category_id")->unsigned();
			$table->foreign("category_id")->references("id")->on("categories");
			$table->timestamps();
		});

		Schema::create("prescriptions", function(Blueprint $table) {
			$table->increments("id");
			$table->string("patient_name");
			$table->string("patient_address", 300);
			$table->integer("patient_age")->unsigned();
			$table->integer("doctor_id")->unsigned();
			$table->foreign("doctor_id")->references("id")->on("doctors");
			$table->timestamps();
		});
		Schema::create("prescription_medicine", function(Blueprint $table) {
			$table->integer("prescription_id")->unsigned();
			$table->integer("medicine_id")->unsigned();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
