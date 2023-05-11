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

 Route::get('login2', 'App\Http\Controllers\AuthController@showLoginForm')->name('login');
 Route::post('login2', 'App\Http\Controllers\AuthController@login');
 Route::get('register', 'App\Http\Controllers\AuthController@showRegistrationForm')->name('register');
// Route::post('register', 'App\Http\Controllers\AuthController@register');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('counter','App\Http\Livewire\Counter@render')->name('counter');
Route::get('/movies', function(){
    return view('movies');
});
// Route::post('/movies', function(){
//     return view('movies');
// });
