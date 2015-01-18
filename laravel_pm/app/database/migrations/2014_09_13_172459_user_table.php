<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
        Schema::create("users", function(Blueprint $table) {
            $table->increments("id");
            $table->string("username", 100)->unique();
            $table->string("password", 100);
            $table->boolean("is_active");
            $table->integer("userable_id")->unsigned();
            $table->string("userable_type", 25);
            $table->string("remember_token", 100)->nullable();
            $table->unique(array("userable_id", "userable_type"));
            $table->timestamps();
        });

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
        Schema::drop("users");
	}

}
