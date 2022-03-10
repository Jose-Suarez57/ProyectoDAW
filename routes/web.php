<?php

use App\Http\Controllers\CommentaryController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
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

Route::get('/', [PrincipalController::class, 'index'])->name('index');

Route::resource("posts", PostController::class);

Route::resource("categories", CategoryController::class);

Route::resource("commentaries", CommentaryController::class);

Route::get('/categories', [CategoryController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
