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
    Route::get('/article/category/{category}',[ArticleController::class,'articleByCategory'])->name('article.category');
    Route::get('/article/detail/{article}',[ArticleController::class,'show'])->name('article.detail');
});
// User
Route::delete('user/delete/',[Mycontroller::class,'user.eliminate'])->name('user.eliminate');