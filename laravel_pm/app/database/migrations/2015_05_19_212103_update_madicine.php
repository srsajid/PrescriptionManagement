<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMadicine extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
	    Schema::table("medicines", function(Blueprint $table) {
            $table->string("pack_size")->nullable();
            $table->string("brand_name")->nullable();
            $table->double("unit_price")->nullable();
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
