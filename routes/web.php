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

Auth::routes();
Route::get('/workshop', 'WorkshopsController@index')->name('workshop');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/myWorkshops', 'myWorkshopsController@index')->name('myWorkshops');
Route::get('/workshop/create', 'WorkshopsController@create')->name('CreateWorkshop');
Route::post('','ideaSubmitController@store')->name('ideaSubmit.store');
Route::get('/ideaSubmit', 'ideaSubmitController@index')->name('ideaSubmit');
Route::get('/ideaSubmit/create', 'ideaSubmitController@create')->name('CreateIdeaSubmit');
Route::post('store', 'WorkshopsController@store')->name("workshop.store");
Route::get('/adminHome', 'AdminController@index')->name('adminHome');
Route::post('/activate', 'AdminController@edit')->name("admin.edit");
Route::get('/myWorkshops/ideas', 'workshopIdeasController@index')->name('workshopIdeas');
Route::post('/startShuffle','ShuffelingController@shuffle')->name('shuffle.shuffle');
Route::get('/ideasToRate', 'ShuffelingController@index')->name('ideasToRate');
Route::post('rate', 'ShuffelingController@rate')->name('shuffle.rate');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
