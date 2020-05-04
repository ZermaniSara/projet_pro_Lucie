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
    return view('auth/login');
});

Route::resource('ajaxproducts','ProductAjaxController',['middleware' => 'isadmin']);

Route::resource('contact','ContactController', ['middleware' => 'isuser']);
Route::resource('message','MessageController',['middleware' => 'isadmin']);


Route::get('admin',['middleware' => 'isadmin', function () {
    return view('productAjax');
}]);

Route::get('visiteur',['middleware' => 'auth', function () {
    return view('visiteur');
}]);

Route::get('user',['middleware' => 'isuser', function () {
    return view('download');
}]);

Auth::routes(['verify'=>true]);


Auth::routes();


Route::get('/', 'HomeController@index')->name('home');

Route::get('post', 'PostController@index');




// Route::get('contact/{id}','ContactController@show')->name('contact.show');
// Route::delete('contact/{id}','ContactController@destroy')->name('contact.destroy');
Route::post('/SendU','ContactController@sendMessage')->name('contact.send');
Route::get('/contactU','ContactController@user')->name('contact.user');
Route::post('/contactA','ContactController@store2')->name('contact.store2');

Route::post('/messageA','MessageController@store2')->name('message.store2');
 Route::get('/MessageR','MessageController@show')->name('message.show');

Route::get('/MessageM','MessageController@user')->name('message.user');
Route::post('/SendA','MessageController@sendMessage')->name('message.send');