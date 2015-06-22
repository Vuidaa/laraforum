<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablesMigration extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//users
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('slug')->unique();
			$table->string('name');
			$table->string('username')->unique();
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->boolean('admin')->default(0);
			$table->string('city');
			$table->string('signature')->default('You have to learn the rules of the game. And then you have to play better than anyone else.');
			$table->string('avatar');
			$table->rememberToken();
			$table->timestamps();
		});

		//passwords resets
		Schema::create('password_resets', function(Blueprint $table)
		{
			$table->string('email')->index();
			$table->string('token')->index();
			$table->timestamp('created_at');
		});

		//sections
		Schema::create('sections', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('slug')->unique();
			$table->string('title');
			$table->timestamps();
		});

		//forums
		Schema::create('forums', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('section_id')->unsigned();
			$table->string('title');
			$table->text('description');
			$table->string('slug')->unique();
			$table->timestamps();
			$table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
		});

		//topics
		Schema::create('topics', function(Blueprint $table)
		{
			//forum_id,user_id,title,slug,description,important,
			$table->increments('id');
			$table->integer('forum_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->string('slug')->unique();
			$table->string('title');
			$table->string('description');
			$table->boolean('important')->default(0);
			$table->foreign('forum_id')->references('id')->on('forums')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->timestamps();
		});

		//posts
		Schema::create('posts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('topic_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->text('post_body');
			$table->timestamps();

			$table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});

		//private messages
		Schema::create('private_messages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('sender_id')->unsigned();
			$table->integer('recipient_id')->unsigned();
			$table->text('message');
			$table->string('status');
			$table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('recipient_id')->references('id')->on('users')->onDelete('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('private_messages');
		Schema::drop('posts');
		Schema::drop('topics');
		Schema::drop('forums');
		Schema::drop('sections');
		Schema::drop('password_resets');
		Schema::drop('users');
	}

}

