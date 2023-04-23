<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Mycontroller;
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
// HOMEPAGE
Route::get('/',[Mycontroller::class,'homepage'] )->name('homepage');

// Article
Route::middleware(['auth'])->group(function()
{
    Route::get('/article/index',[ArticleController::class,'index'])->name('article.index');
    Route::get('/article/create',[ArticleController::class,'create'])->name('article.create');
});
// User
Route::delete('user/delete/',[Mycontroller::class,'user.eliminate'])->name('user.eliminate');