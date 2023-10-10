<?php


// ini connect di models



// ini semua mengunakan fungsi yg berada di berbagai folder ini 

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\postController;
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



// this home
Route::get('/', [postController::class, 'view']); 

// this about
Route::get('/about', [postController::class, 'viewAbout']); 

// this post
Route::get('/posts', [postControlleR::class, 'index'] );

// this single post
Route::get('posts/{post:slug}', [postController::class, 'show']);

// this  categories
Route::get('/categories', [CategoryController::class, 'handleCategories']);




