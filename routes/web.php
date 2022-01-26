<?php
use App\Models\Post;
use App\Http\Controllers\PostsController;
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
// Route::get('/hello', function () {
//     return '<h1>Hello World</h1>';
// });
// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/hello/{id}', function ($id) {
//     return 'Hello '.$id;
// });
// Route::get('/hello/{id}/{name}', function ($id,$name) {
//     return 'Hello '.$name.' you have an id of '.$id;
// });
Route::get('/', function () {
        return view('layouts.home');
    });
Route::get('/services', 'App\Http\Controllers\PostsController@services');
// Route::get('/about', [PostsController::Class, 'about']);
// Route::get('/about', 'PostsController@about');
Route::get('/about', 'App\Http\Controllers\PostsController@about');
Route::get('/posts/delete/{id}', 'App\Http\Controllers\PostsController@destroy');
// Route::resource('posts', 'PostsController');
Route::resource('posts', 'App\Http\Controllers\PostsController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
