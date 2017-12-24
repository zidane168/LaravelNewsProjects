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

use App\TheLoai;

Route::get('/', function () {
    return view('welcome');
});

/*

Giáo Dục
Nhịp Điệu Trẻ
Du Lịch
Du Học
Sennehi 12

Route::get('test', function(){
	// muon biet the loai co bao nhieu loai tin
	/*$theloai = TheLoai::find(1);	// the loai co id = 1


	// $theloai->loaitin: xem trong model TheLoai xem ham loaitin
	foreach ($theloai->loaitin as $loaitin) {
		echo $loaitin->Ten . "<br>" ;
	}

});
*/

Route::get('test', function(){
	return view('admin.theloai.danhsach');
});

// tao nhom quan ly
// lam nhu vay gán middleware ko phải mất công

Route::group(['prefix'=>'admin'], function(){
	Route::group(['prefix'=>'theloai'], function(){

		// admin/theloai/danhsach
		Route::get('danhsach', 'TheLoaiController@Get');

		// admin/theloai/sua
		Route::get('sua/{id}', 'TheLoaiController@Update');

		// admin/theloai/sua
		Route::post('sua/{id}', 'TheLoaiController@UpdatePost');

		// admin/theloai/them
		Route::get('them', 'TheLoaiController@Add');


		Route::post('them', 'TheLoaiController@AddPost');

		// admin/theloai/xoa/{1}
		Route::get('xoa/{id}', 'TheLoaiController@Delete');
	});


	Route::group(['prefix'=>'loaitin'], function(){

		// admin/loaitin/danhsach
		Route::get('danhsach', 'LoaiTinController@Get');

		// admin/loaitin/sua
	/*	Route::get('sua/{id}', 'LoaiTinController@Update');
		Route::post('sua/{id}', 'LoaiTinController@UpdatePost');*/

		// admin/loaitin/them
	/*	Route::get('them', 'LoaiTinController@Add');
		Route::post('them', 'LoaiTinController@AddPost');
*/
	//	
		Route::get('xoa/{id}','LoaiTinController@Delete');
	});

	Route::group(['prefix'=>'tintuc'], function(){

		// admin/tintuc/danhsach
		Route::get('danhsach', 'TinTucController@Get');

		// admin/tintuc/sua
		Route::get('sua', 'TinTucController@Update');

		// admin/tintuc/them
		Route::get('them', 'TinTucController@Add');
	});


});
