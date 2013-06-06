<?php

class Create_Category_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('categories', function($table) {
			
			$table->create();

			$table->increments('id');
			$table->string('name', 35);			
			$table->timestamps();
		});

		// did this to add a bigint column.
		//DB::query('ALTER TABLE participants ADD id BIGINT NOT NULL PRIMARY KEY');
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('categories');	
	}

}