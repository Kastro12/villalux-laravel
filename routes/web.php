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


Route::get('/','PagesController@index');
Route::post('contact','PagesController@postContact')->name('contact');
Route::get('profile','PagesController@profile')->middleware('auth')->name('profile');

Route::resource('gallery','GalleryController');
Route::resource('reserve','ReserveController');
Route::post('reserve/showDays','ReserveController@showDays');
Route::post('reserve/showPrice','ReserveController@showPrice');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function (){

    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'Admin\AdminController@index')->name('admin');


    // Users
    Route::get('/users','Admin\UsersController@index')->name('admin.users');
    Route::get('/usersWithRes','Admin\UsersController@usersWithRes')->name('admin.usersWithRes');
    Route::get('/usersWithoutRes','Admin\UsersController@usersWithoutRes')->name('admin.usersWithoutRes');
    Route::delete('/usersWithoutRes/{id}','Admin\UsersController@destroy');

    //Reservations
    Route::get('/reservations','Admin\ReserveController@index')->name('admin.reservations');
    Route::get('/reservations/unconfirmed','Admin\ReserveController@unconfirmed')->name('admin.reservations.unconfirmed');
    Route::get('/reservations/confirmed','Admin\ReserveController@confirmed')->name('admin.reservations.confirmed');
    Route::delete('/reservations/confirmed/{id}','Admin\ReserveController@destroy');
    Route::get('/reservations/confirmed/edit/{id}','Admin\ReserveController@edit');
    Route::put('/reservations/confirmed/update/{id}','Admin\ReserveController@update')->name('update.price');
    Route::get('/reservations/paid','Admin\ReserveController@paidRes')->name('admin.reservations.paid');

    //Gallery
    Route::get('/gallery','Admin\GalleryController@index')->name('admin.gallery');
    Route::delete('/gallery/image/{id}','Admin\GalleryController@destroy');
    Route::get('/gallery/create','Admin\GalleryController@newGallery')->name('admin.gallery.create');
    Route::post('/gallery/create','Admin\GalleryController@create');

    //Apartments
    Route::get('/apartments','Admin\ApartmentsController@index')->name('admin.apartments');
    Route::get('/apartments/{id}/edit','Admin\ApartmentsController@edit')->name('admin.apartments.edit');
    Route::put('/apartments/{id}','Admin\ApartmentsController@update')->name('admin.apartments.update');

    //Payments
    Route::get('/payments','Admin\PaymentsController@index')->name('admin.payments');
    Route::get('/payments/past','Admin\PaymentsController@pastY')->name('admin.payments.past');
});

