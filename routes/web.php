<?php

use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\AssignedArticlesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\HomeSiteController;
use App\Http\Controllers\User\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendEmailNotificationController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\Admin\AdminReviewController;
use App\Http\Controllers\Admin\AdminJournalController;
use App\Http\Controllers\DownloadFileController;
use App\Http\Controllers\Admin\PublishedArticlesController;
use App\Http\Controllers\GeneratePDFController;

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
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('users', [UsersController::class, 'index']);
    Route::get('add-user', [UsersController::class, 'create']);
    Route::post('add-user', [UsersController::class, 'store']);
    Route::get('edit-user/{user_id}', [UsersController::class, 'edit']);
    Route::put('update-user/{user_id}', [UsersController::class, 'update']);
    Route::get('delete-user/{user_id}', [UsersController::class, 'delete']);
    

    Route::get('articles', [ArticlesController::class, 'index']);
    Route::get('edit-article/{article_id}', [ArticlesController::class, 'edit']);
    Route::put('update-article/{article_id}', [ArticlesController::class, 'update']);
    Route::get('articles/delete-article/{article_id}', [ArticlesController::class, 'delete']);

    Route::get('articles/assigned', [AssignedArticlesController::class, 'index']);
    Route::get('articles/published', [PublishedArticlesController::class, 'index']);

    Route::get('reviews', [AdminReviewController::class, 'index']);
    Route::get('delete-review/{review_id}', [AdminReviewController::class, 'delete']);
    Route::get('display-review/{review_id}', [AdminReviewController::class, 'display']);

    Route::get('journals', [AdminJournalController::class, 'index']);
    Route::get('add-journal', [AdminJournalController::class, 'create']);
    Route::post('add-journal', [AdminJournalController::class, 'store']);
    Route::get('edit-journal/{journal_id}', [AdminJournalController::class, 'edit']);
    Route::put('update-journal/{journal_id}', [AdminJournalController::class, 'update']);
    Route::get('delete-journal/{journal_id}', [AdminJournalController::class, 'delete']);


    

    Route::get('category', [CategoryController::class, 'index']);
    Route::get('add-category', [CategoryController::class, 'create']);
    Route::post('add-category', [CategoryController::class, 'store']);
    Route::get('edit-category/{category_id}', [CategoryController::class, 'edit']);
    Route::put('update-category/{category_id}', [CategoryController::class, 'update']);
    Route::get('delete-category/{category_id}', [CategoryController::class, 'delete']);

    

});

// user

Route::middleware(['auth','verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/article', [ArticleController::class, 'index'])->name('article.index');
    Route::get('/article/add', [ArticleController::class, 'add'])->name('article.add');
    Route::post('/article/add', [ArticleController::class, 'store'])->name('article.add');
    Route::get('/article/display-article/{article_id}', [ArticleController::class, 'display'])->name('article.display');
    Route::get('/article/edit-article/{article_id}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('/article/update-article/{article_id}', [ArticleController::class, 'update'])->name('article.update');
    Route::get('/article/delete-article/{article_id}', [ArticleController::class, 'delete'])->name('article.delete');

    Route::get('/review', [ReviewController::class, 'index'])->name('review.index');
    Route::get('/review/display-review/{article_id}', [ReviewController::class, 'display'])->name('review.display');
    Route::get('/review/add-review/{article_id}', [ReviewController::class, 'add'])->name('review.add');
    Route::post('/review/add-review/{article_id}', [ReviewController::class, 'store'])->name('review.store');
    Route::get('/review/edit-review/{review_id}', [ReviewController::class, 'edit'])->name('review.edit');
    Route::put('/review/update-review/{review_id}', [ReviewController::class, 'update'])->name('review.update');
});


// guest

Route::get('/download/{filename}', [DownloadFileController::class, 'download']);
Route::get('/download/journal/{filename}', [DownloadFileController::class, 'downloadJournal']);
Route::get('/download/letter/{filename}', [DownloadFileController::class, 'downloadLetter']);

Route::get('/generate-pdf/{review_id}', [GeneratePDFController::class, 'generate']);

Route::prefix('')->group(function () {
    Route::get('/', [HomeSiteController::class, 'index']);
    Route::get('/home/archive', [HomeSiteController::class, 'archive']);
    Route::get('/home/about', [HomeSiteController::class, 'about']);
    Route::get('/home/contact', [HomeSiteController::class, 'contact']);
    Route::get('/home/details/{article_id}', [HomeSiteController::class, 'details']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
