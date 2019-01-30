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

Route::get('admin/login','Admin\UsersController@getLogin');
Route::post('admin/login','Admin\UsersController@postLogin');
Route::group(['prefix'=>'admin','middleware'=>'adminloginmiddleware'],function(){
Route::get('/home', 'Admin\UsersController@home')->name('homeadmin');
	Route::get('logout','Admin\UsersController@getLogout');

	Route::group(['prefix'=>'theloai'],function(){
		Route::get('list','Admin\TheloaiController@getList');
		
		Route::get('add','Admin\TheloaiController@getAdd');
		Route::post('add','Admin\TheloaiController@postAdd');

		Route::get('edit/{id}','Admin\TheloaiController@getEdit');
		Route::post('edit/{id}','Admin\TheloaiController@postEdit');

		Route::get('del/{id}','Admin\TheloaiController@getDel');
});
	Route::group(['prefix'=>'loaitin'],function(){
		Route::get('list','Admin\LoaitinController@getList');
		
		Route::get('add','Admin\LoaitinController@getAdd');
		Route::post('add','Admin\LoaitinController@postAdd');
		

		Route::get('edit/{id}','Admin\LoaitinController@getEdit');
		Route::post('edit/{id}','Admin\LoaitinController@postEdit');

		Route::get('del/{id}','Admin\LoaitinController@getDel');
});

	Route::group(['prefix'=>'slide'],function(){
		Route::get('list','Admin\SlideController@getList');

		
		Route::get('add','Admin\SlideController@getAdd');
		Route::post('add','Admin\SlideController@postAdd');
		
		Route::get('edit/{id}','Admin\SlideController@getEdit');
		Route::post('edit/{id}','Admin\SlideController@postEdit');

		Route::get('del/{id}','Admin\SlideController@getDel');
});
	Route::group(['prefix'=>'tintuc'],function(){
		Route::get('list','Admin\TinTucController@getList');
		Route::get('add','Admin\TinTucController@getAdd');
		Route::post('add','Admin\TinTucController@postAdd');

		Route::get('edit/{id}','Admin\TinTucController@getEdit');
		Route::post('edit/{id}','Admin\TinTucController@postEdit');

		Route::get('del/{id}','Admin\TinTucController@getDel');
});
	Route::group(['prefix'=>'ajax'],function(){
		Route::get('loaitin/{idTheLoai}','Admin\AjaxController@getLoaiTin');
	});

	Route::group(['prefix'=>'user'],function(){
		Route::get('list','Admin\UsersController@getList');

		Route::get('add','Admin\UsersController@getAdd');
		Route::post('add','Admin\UsersController@postAdd');

		Route::get('edit/{id}','Admin\UsersController@getEdit');
		Route::post('edit/{id}','Admin\UsersController@postEdit');
		
		Route::get('del/{id}','Admin\UsersController@getDel');
	});


});




Route::get('/home','Front\HomeController@home');
Route::get('/','Front\HomeController@home');
Route::get('/about','Front\HomeController@about');
Route::get('/contact','Front\HomeController@contact');
Route::get('/detail','Front\HomeController@detail');
Route::get('/category/{id}/{TenKhongDau}.html','Front\HomeController@category');
Route::get('/detail/{id}/{TenKhongDau}.html','Front\HomeController@detail');

Route::get('/login','Front\HomeController@getlogin');
Route::post('/login','Front\HomeController@postLogin');

Route::get('/logout','Front\HomeController@getLogout');

Route::get('/register','Front\HomeController@getRegister');
Route::post('/register','Front\HomeController@postRegister');

Route::get('/account','Front\HomeController@getAccount');
Route::post('/comment/{id}','Front\HomeController@postComment');
Route::get('detail/comment/delete/{id}/{idTinTuc}','Front\HomeController@deleteComment');
Route::post('/search','Front\HomeController@search');