<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
		return view('welcome');
	});

Route::get('bvh1', function () {
		echo "hello world";
	});

Route::get('bvh/{ten}', function ($ten) {
		echo "$ten";
	});

Route::get('bvh/{ten?}', function ($ten = "bvh") {
		echo "$ten";
	});

Route::get('bvh_where/{ten}/{tuoi}', function ($ten, $tuoi) {
		echo "$ten $tuoi";
	})->where(['ten' => '[a-zA-Z]+', 'tuoi' => '[0-9]{1,3}']);

Route::get('test_controller', 'Controller@redirectController');

Route::get('dinh-danh', ['as' => 'dd', function () {
			echo "test dinh danh";
		}]);

//group url
Route::group(['prefix' => 'thuongtin'], function () {
		Route::get('hatay', function () {
				echo "day la ha tay";
			});
		Route::get('hadong', function () {
				echo "day la ha dong";
			});
		Route::get('hanam', function () {
				echo "day la ha nam";
			});
		Route::get('habac', function () {
				echo "day la ha bac";
			});
	});
//tao bang
Route::get('create_table_user/{name}', function ($name) {
		Schema::create($name, function ($nameTable) {
				$nameTable->increments('id');
				$nameTable->string('name');
				$nameTable->integer('age');
			});
	});

//doi ten bang
Route::get('rename_table/{old_name}/{new_name}', function ($old_name, $new_name) {
		Schema::rename($old_name, $new_name);
	});
//xoa bang
Route::get('delete_table/{name}', function ($name) {
		Schema::dropIfExists($name);
	});

//thay doi thuoc tin bang
Route::get('change_table/{name}', function ($name) {
		Schema::table($name, function ($table) {
				$table->string('name', 50)->change();
			});
	});

Route::get('create_table_car', function () {
		Schema::create('car', function ($table) {
				$table->increments('id');
				$table->string('name');
				$table->integer('price');

				$table->integer('user_id')->unsigned();
				$table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
			});
	});

Route::get('create_kind', function () {
		Schema::create('kind', function ($table) {
				$table->increments('id');
				$table->string('name');
				$table->string('path');
				$table->integer('total');
			});
	});

Route::get('create_file', function () {
		Schema::create('file', function ($table) {
				$table->increments('id');
				$table->string('name');
				$table->string('path');
				$table->integer('kind_id')->unsigned();
				$table->foreign('kind_id')->references('id')->on('kind')->onDelete('cascade');
			});
	});

Route::get('insert_kind', 'Controller@insertKind');
Route::get('get_all_kind', 'Controller@getAllKind');
Route::get('get_file/{id}', 'Controller@getFileByIdKind');
Route::get('get_all_mp3', 'Controller@getAllFileMp3');
Route::get('get_file_by_name/{name}', 'Controller@getFileByName');