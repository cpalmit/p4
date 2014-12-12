<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("accounts", function($table) {

			// AI, PK
			$table->increments("id");

			// "created_at" and "updated_at"
			$table->timestamps();

			// content
			$table->integer("category_id")->unsigned(); // FK
			$table->string("name");
			$table->string("website");
			$table->string("facebook");
			$table->string("twitter");
			$table->string("instagram");
			$table->string("youtube");
			$table->string("tumblr");
			$table->string("flickr");

			// FK
			$table->foreign("category_id")->references("id")->on("categories");
    	});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop("accounts");
	}

}