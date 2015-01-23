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
			$table->string("ingredients");
			$table->integer("category_id")->unsigned();
			$table->foreign("category_id")->references("id")->on("categories");
			$table->timestamps();
		});

		Schema::create("prescriptions", function(Blueprint $table) {
			$table->increments("id");
			$table->string("patient_name");
			$table->string("patient_address", 300);
			$table->string("patient_age", 100);
			$table->integer("doctor_id")->unsigned();
			$table->foreign("doctor_id")->references("id")->on("doctors");
			$table->timestamps();
		});

		Schema::create("prescription_items", function(Blueprint $table) {
			$table->increments("id");
			$table->string("name");
			$table->string("description");
			$table->integer("prescription_id")->unsigned();
			$table->foreign("prescription_id")->references("id")->on("prescriptions");
			$table->integer("medicine_id")->unsigned()->nullable();
			$table->foreign("medicine_id")->references("id")->on("medicines");
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
