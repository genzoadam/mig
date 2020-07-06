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

Route::get('/dashboard', [
    'as' => 'home',
    'uses' => 'HomeController@index'
]);

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


//rute company
Route::resource('company', 'CompanyController');

//rute kebun
Route::resource('kebun', 'KebunController');

//rute divisi
Route::resource('divisi', 'DivisiController');

//rute blok
Route::resource('blok', 'BlokController');


//reportlist
Route::get('/reportlist', [
    'as' => 'reportList.index',
    'uses' => 'ReportListController@index'
]);
Route::get('/reportlist/create', [
    'as' => 'reportList.create',
    'uses' => 'ReportListController@create'
]);
Route::post('/reportlist/store', [
    'as' => 'reportList.store',
    'uses' => 'ReportListController@store'
]);
Route::get('/reportlist/destroy/{id}', [
    'as' => 'reportList.destroy',
    'uses' => 'ReportListController@destroy'
]);

//reportshow
Route::get('/reportshow/{id}', [
    'as' => 'reportShow.index',
    'uses' => 'ReportShowController@index'
]);
Route::get('/reportshow/create/{id}', [
    'as' => 'reportShow.create',
    'uses' => 'ReportShowController@create'
]);
Route::post('/reportshow/create/store', [
    'as' => 'reportShow.store',
    'uses' => 'ReportShowController@store'
]);

//get data kebun berdsrkan company //// report create
Route::post('reportlist/create/getKebun', 'ReportListController@getKebun')->name('getKebun');
//get data kebun berdsrkan company //// report create
Route::post('reportshow/create/getBlok', 'ReportShowController@getBlok')->name('getBlok');