<?php

use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\HomeSiteController;
use App\Http\Controllers\User\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendEmailNotificationController;

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

// admin

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('dashboard', [DashboardController::class, 'dashboard']);

    Route::get('users', [UsersController::class, 'index']);
    Route::get('edit-user/{user_id}', [UsersController::class, 'edit']);
    Route::put('update-user/{user_id}', [UsersController::class, 'update']);
    Route::get('delete-user/{user_id}', [UsersController::class, 'delete']);
    

    Route::get('articles', [ArticlesController::class, 'index']);
    Route::get('edit-article/{article_id}', [ArticlesController::class, 'edit']);
    Route::put('update-article/{article_id}', [ArticlesController::class, 'update']);
    Route::get('articles/delete-article/{article_id}', [ArticlesController::class, 'delete']);
    

    Route::get('category', [CategoryController::class, 'index']);
    Route::get('add-category', [CategoryController::class, 'create']);
    Route::post('add-category', [CategoryController::class, 'store']);
    Route::get('edit-category/{category_id}', [CategoryController::class, 'edit']);
    Route::put('update-category/{category_id}', [CategoryController::class, 'update']);
    Route::get('delete-category/{category_id}', [CategoryController::class, 'delete']);

    

});

// user

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/article', [ArticleController::class, 'index'])->name('article.index');
    Route::get('/article/add', [ArticleController::class, 'add'])->name('article.add');
    Route::post('/article/add', [ArticleController::class, 'store'])->name('article.add');
});


// guest

Route::prefix('home')->group(function(){
    Route::get('about', [HomeSiteController::class, 'about']);
    Route::get('contact', [HomeSiteController::class, 'contact']);
});


Route::get('/', function () {
    return view('home.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
