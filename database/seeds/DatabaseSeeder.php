<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run() {
		// $this->call(UsersTableSeeder::class);
	}
}

class UserSeeder extends Seeder {

	public function run() {
		DB::table('user')->insert(
			[$arrayName = array('name' => 'bvh', 'age' => '22')]
			[$arrayName = array('name' => 'bvh', 'age' => '22')]
			[$arrayName = array('name' => 'bvh', 'age' => '22')]
			[$arrayName = array('name' => 'bvh', 'age' => '22')]
		);
	}
}
