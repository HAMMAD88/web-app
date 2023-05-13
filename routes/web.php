<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/home', function () {
//     return 'welcome';
// });
// Route::get('login', 'App\Http\Controllers\AuthController@showLoginForm')->name('login');
// Route::get('register', function () {
//     return view('register');
// })->name('register');

//  Route::get('login2', 'App\Http\Controllers\AuthController@showLoginForm')->name('login');
//  Route::post('login2', 'App\Http\Controllers\AuthController@login');
//  Route::get('register', 'App\Http\Controllers\AuthController@showRegistrationForm')->name('register');
// Route::post('register', 'App\Http\Controllers\AuthController@register');


Auth::routes();
Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::get('/register', [App\Http\Controllers\AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::get('/movies', [App\Http\Controllers\MovieController::class, 'index'])->name('movies.index');
Route::post('/movies', [App\Http\Controllers\MovieController::class, 'store'])->name('movies.store');

Route::get('/movies/{id}', [App\Http\Controllers\PostController::class, 'show'])->name('posts.show');// routes/web.php
Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
Route::get('/posts/{id}', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');

Route::post('/posts', [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
Route::post('/posts/{id}/like', [App\Http\Controllers\PostController::class, 'like'])->name('posts.like');
Route::post('/posts/{id}/dislike', [App\Http\Controllers\PostController::class, 'dislike'])->name('posts.dislike');
