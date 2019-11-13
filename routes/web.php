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

// DB::listen(function ($event) {
//     dump($event->sql);
// });

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/logmasuk', 'Auth\LoginController@showLoginForm');

Route::get('/home', 'HomeController@index')->name('comment.test');

Route::resource('/comment', 'CommentController')->except([
    'create','show'
]);

Route::get('/comment/{id}','CommentController@paparan')->name('comment.show');

Route::get('/comment/{id}/mynumber', 'CommentController@mynumber')->name('comment.mynumber');

Route::resource('post', 'PostController')->except('delete');
Route::post('post/delete','PostController@destroy')->name('post.delete');
