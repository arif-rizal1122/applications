<?php


use Illuminate\Support\Facades\Route;
// ini semua mengunakan fungsi yg berada di berbagai folder ini 

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
Route::get('/', [postController::class, 'view']); 

// this about
Route::get('/about', [postController::class, 'viewAbout']);
 

// this post
Route::get('/posts', [postControlleR::class, 'index'] );


// this single post
Route::get('posts/{post:slug}', [postController::class, 'show']);


// this  categories
Route::get('/categories', [CategoryController::class, 'handleCategories']);






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


/*
 this resource controller = vontroller yg otomatis mengelola sata crud
*/

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');




