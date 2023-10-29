<?php

use Illuminate\Support\Facades\Route;
// ini semua mengunakan fungsi yg berada di berbagai folder ini 

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\postController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;


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
Route::get('/', [postController::class, 'view'])->middleware('guest'); 

// this about
Route::get('/about', [postController::class, 'viewAbout'])->middleware('guest');
 

// this post
Route::get('/posts', [postControlleR::class, 'index'] )->middleware('guest');


// this single post models
Route::get('posts/{post:slug}', [postController::class, 'show'])->middleware('guest');


// this  categories
Route::get('/categories', [CategoryController::class, 'handleCategories'])->middleware('guest');



     


// ->middleware('guest'); = ini hanya bisa diakses oleh user yg belum terontefikasi
// this login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

// this Login
Route::post('/login', [LoginController::class, 'authenticate']);

// this register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

// this register
Route::post('/register', [RegisterController::class, 'store']);

// this dashboard
// ->middleware('auth'); = ini hanya bisa diakses oleh user yg sudah login
Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

// this Logout
Route::post('/logout', [LoginController::class, 'logout']);




// this checkSlug
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);

/*
 this resource controller = vontroller yg otomatis mengelola crud
*/

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

/*RESOURCE = 1. kalau method nya get diarahkan ke index
             2. KALAU METHOD NYA POST DIARAHKAN KE CLASS STORE
             3. KALAU METHOD NYA PUT DIARAHKAN KE CLASS UPDATE
             4. KALAU METHOD NYA DELETE MAKA AKAN DIARAHKAN KE DESTROY
*/ 



/*
 this resource controller admin = vontroller yg otomatis mengelola sata crud

->except('show'); = method show tidak bisa diakses / pengecualian
*/

// Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('isAdmin');
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show');

