<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\IndexController;

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

Route::get('/', [IndexController::class, 'home'])->name('home_page');

Route::get('/category/{slug}-{id}.html', [IndexController::class, 'category'])->where(
    [
        'slug' => '.+',
        'id' => '[0-9]+',  //biểu thức chính quy
    ]
)->name('category_slug');

Route::get('/book/{slug}-{id}.html', [IndexController::class, 'book'])->where(
    [
        'slug' => '.+',
        'id' => '[0-9]+',  //biểu thức chính quy
    ]
)->name('book_detail');

Route::get('/book/{slug}/{slug_chapter}/{id_chapter}.html', [IndexController::class, 'chapter'])->where(
    [
        'slug' => '.+',
        'slug_chapter' => '.+',
        'id_chapter' => '[0-9]+',  //biểu thức chính quy
    ]
)->name('chapter_detail');

Route::get('/detail', function () {
    return view('pages.book-detail');
});

//Search Book
Route::get('search', [IndexController::class, 'search'])->name('search_book_get');
Route::post('search_ajax', [IndexController::class, 'search_ajax'])->name('search_book_ajax');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('book', BookController::class);

Route::resource('category', CategoryController::class);

Route::resource('chapter', ChapterController::class);
