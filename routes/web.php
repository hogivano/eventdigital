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
    return view('maintence');
});

Route::get('daftar', 'SignUpController@daftarPage');
Route::post('daftar', 'SignUpController@signUp')->name('signup.submit');

Route::get('l4s0k', 'LoginController@masukPage');
Route::post('l4s0k', 'LoginController@login')->name('login.submit');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('verify-user/{token}', 'SignUpController@verifyUser')->name('user.verify');

Route::get('400', ['as'=>'400', 'ErrorHandlerController@show400']);
Route::get('401', ['as'=>'401', 'ErrorHandlerController@show401']);
Route::get('403', ['as'=>'403', 'ErrorHandlerController@show403']);
Route::get('404', ['as'=>'404', 'ErrorHandlerController@show404']);
Route::get('405', ['as'=>'405', 'ErrorHandlerController@show405']);
Route::get('408', ['as'=>'408', 'ErrorHandlerController@show408']);
Route::get('500',  'ErrorHandlerController@show500');

Route::group(['prefix' => 'admin'], function () {
    Route::get('dashboard', 'AdminController@index')->name('admin.index');

    Route::get('artis', 'AdminController@artisShow')->name('admin.artis');
    Route::post('artis', 'AdminController@artisCreate')->name('artis.submit');

    Route::get('artis/baru', 'AdminController@artisBaruShow')->name('artis.baru');

    Route::get('artis/edit/{id}', 'AdminController@artisEditShow')->name('artis.edit');
    Route::get('artis/delete/{id}', 'AdminController@artisDelete')->name('artis.delete');

    Route::get('end-point', 'AdminController@endPointIndex')->name('admin.end-point');

    Route::get('logout', 'AdminController@logout')->name('admin.logout');
});
