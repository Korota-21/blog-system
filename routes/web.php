<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
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

Route::get('/', [PagesController::class, 'index']);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/home', [PagesController::class, 'home']);

Route::resource('posts', PostsController::class);

/*

Route::get('/about', function () {
    return view("/pages/about");
});
Route::view('/home', 'pages/home');

// pass dynamic value into url
Route::get('/users/{id}/{name}', function ($id,$name) {
    return "this user name is ".$name." and the ID is ".$id;
});


Route::get('/about-me', function () {
    return "<center><h1> Hi it's me Marwa the developer</h1></center>";
});

*/

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashBoardController::class, 'index'])->name('dashboard');
