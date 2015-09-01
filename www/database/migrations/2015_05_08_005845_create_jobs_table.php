<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jobs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('client_name');
			$table->string('title');
			$table->string('address_1');
			$table->string('address_2');
			$table->string('city');
			$table->string('state');
			$table->integer('zip');
			$table->string('country');
			$table->integer('job_id');
			$table->text('description');
			$table->string('category');
			$table->string('sub_category');
			$table->integer('recruiter_id');
			$table->string('recruiter_first');
			$table->string('recruiter_last');
			$table->string('language');
			$table->string('market');
			$table->string('recruiter_email');
			$table->date('start_date');
			$table->date('end_date');
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
		Schema::drop('jobs');
	}

}
