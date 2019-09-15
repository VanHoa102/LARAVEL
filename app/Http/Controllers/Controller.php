<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController {
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function testController() {
		echo "day la test controller";
	}

	public function redirectController() {
		return redirect()->route("dd");
	}

	public function getID_Kind($name_kind) {
		$result = DB::table('kind')->select('id')->where('name', $name_kind)->get();
		return $result;
	}

	public function insertFile($name_kind) {
		// DB::table('kind')->insert([
		// 		['name' => 'animal', 'path' => 'public/animal', 'total' => '100'],
		// 		['name' => 'tree', 'path' => 'public/tree', 'total' => '110']

		if ($handle = opendir(public_path('Ringtone').'/'.$name_kind.'/Mp3')) {

			while (false !== ($entry = readdir($handle))) {
				if ($entry != "." && $entry != "..") {
					// echo $entry."<br>";// NAME OF THE FILE
					DB::table('file')->insert([
							['name' => $entry, 'path' => public_path('Ringtone').'/'.$name_kind.'/Mp3'.$entry, 'kind_id' => 15],
						]);
				}
			}
			closedir($handle);
		}
	}

	public function insertKind() {

		if ($handle = opendir(public_path('Ringtone'))) {

			while (false !== ($entry = readdir($handle))) {
				if ($entry != "." && $entry != "..") {
					// echo $entry."<br>";// NAME OF THE FILE
					$id = DB::table('kind')->insertGetId(
						['name' => $entry, 'path' => public_path('Ringtone').'/'.$entry, 'total' => '100'],
					);

					if ($handle1 = opendir(public_path('Ringtone').'/'.$entry.'/mp3')) {

						while (false !== ($entry1 = readdir($handle1))) {
							if ($entry1 != "." && $entry1 != "..") {
								// echo $entry."<br>";// NAME OF THE FILE
								DB::table('file')->insert([
										['name' => $entry1, 'path' => public_path('Ringtone').'/'.$entry.'/Mp3'.$entry1, 'kind_id' => $id],
									]);
							}
						}
						closedir($handle1);
					}
				}
			}
			closedir($handle);
		}
	}

	public function getAllKind() {
		$result = DB::table('kind')->get();
		echo "<pre>";
		print_r($result);
		echo "</pre>";
	}

	public function getFileByIdKind($id_kind) {

		$result = DB::table('file')->where('kind_id', $id_kind)->get();
		echo "<pre>";
		print_r($result);
		echo "</pre>";
	}

	public function getAllFileMp3() {
		$result = DB::table('file')->get();
		echo "<pre>";
		print_r($result);
		echo "</pre>";
	}

	public function getFileByName($name) {
		$id     = DB::table('kind')->where('name', $name)->first();
		$result = DB::table('file')->where('kind_id', $id->id)->get();
		echo "<pre>";
		print_r($result);
		echo "</pre>";
	}
}
