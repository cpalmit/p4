<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoldsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("holds", function($table) {

			// "created_at" and "updated_at"
			$table->timestamps();

			// content
			$table->integer("id")->unsigned(); // FK
			$table->integer("cat_id")->unsigned(); // FK
			$table->string("name");
			$table->string("website");
			$table->string("facebook");
			$table->string("twitter");
			$table->string("instagram");
			$table->string("youtube");
			$table->string("tumblr");
			$table->string("flickr");

			// FK
			$table->foreign("id")->references("id")->on("accounts");
			$table->foreign("cat_id")->references("id")->on("categories");
    	});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop("holds");
	}

}