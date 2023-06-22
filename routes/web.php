<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/chats','ChatController@index')->name('chats');
Route::get('api/chat/get_all_details','ChatController@getAllDetails');
Route::post('api/chat/fetch_selected_user_details','ChatController@featchSelectedUserDetails');
Route::post('api/chat/send_text','ChatController@sendText');
// Route::get('/chats/{user}', 'ChatController@show')->name('chats.show');
// Route::post('/chats','ChatController@save')->name('chats.save');

Route::get('/users', 'UserController@index');

Route::get('/pusher_test', 'HomeController@test');
Route::get('/pusher_send', 'HomeController@send');
Route::post('/send_details', 'HomeController@sendDetails')->name('send_details');