<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home','filling\dashboardController@dashboard')->name('home')->middleware('auntenticated');
Route::get('/e-filling/public-sections','filling\publicfoldercontroller@PublicFolder')->middleware('auntenticated');

Route::post('/e-filling/add-section','filling\publicfoldercontroller@addsection')->middleware('auntenticated');
Route::get('/e-filling/public-sections/files/{id}','filling\publicfoldercontroller@files')->middleware('auntenticated');

Route::post('/e-filling/public-section/files/upload','filling\uploadcontroller@public_upload')->middleware('auntenticated');
Route::get('/e-filling/public-section/files/download/{id}','filling\downloadcontroller@download')->middleware('auntenticated');

Route::get('/e-filling/department','filling\departmentcontroller@department')->middleware('auntenticated');
Route::get('/e-filling/personal','filling\departmentcontroller@personal')->middleware('auntenticated');


//student
Route::resource('student/dashboard','StudentSubmitsController')->middleware('auntenticated');
Route::resource('/student/submited' ,'StudentController')->middleware('auntenticated');
Route::resource('/student/uploaded', 'StudentUploadsController')->middleware('auntenticated');
Route::get('/student/uploaded/{id}/download', 'StudentUploadsController@download')->name('studentdownload')->middleware('auntenticated');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
