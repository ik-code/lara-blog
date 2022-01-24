<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\FrontCategoryController;
use App\Http\Controllers\FrontPostController;
use App\Http\Controllers\FrontTagController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\UserController;
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

Route::get('/', [FrontPostController::class, 'index'])->name('home');
Route::get('/article/{slug}', [FrontPostController::class, 'show'])->name('posts.single');
Route::get('/category/{slug}', [FrontCategoryController::class, 'index'])->name('categories.single');
Route::get('/tag/{slug}', [FrontTagController::class, 'index'])->name('tags.single');
Route::post('/subscribe', [SubscriberController::class, 'store'])->name('subscriber.store');
Route::get('/search', [SearchController::class, 'index'])->name('search');

Route::prefix('admin')->middleware('admin')->group(function (){
    Route::get('/', [MainController::class, 'index'])->name('admin.index');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/tags', TagController::class);
    Route::resource('/posts', PostController::class);
    Route::get('/subscribers', [SubscriberController::class, 'index'])->name('subscribers.index');
    Route::delete('/subscribers/{subscriber}', [SubscriberController::class, 'destroy'])->name('subscribers.destroy');
});

Route::middleware('guest')->group(function (){
    Route::get('/register', [UserController::class, 'create'])->name('register.create');
    Route::post('/register', [UserController::class, 'store'])->name('register.store');
    Route::get('/login', [UserController::class, 'loginForm'])->name('login.form');
    Route::post('/login', [UserController::class, 'login'])->name('login');
});

Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');
