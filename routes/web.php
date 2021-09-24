<?php

use App\Mail\devMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FileUploadController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('auth/github', [SocialController::class, 'gitRedirect']);
Route::get('auth/github/callback', [SocialController::class, 'gitCallback']);

Route::get('auth/google', [SocialController::class, 'googleRedirect']);
Route::get('auth/google/callback', [SocialController::class, 'googleCallback']);

Route::get('/upload', [FileUploadController::class, 'showUploadForm']);
Route::post('/upload', [FileUploadController::class, 'storeUploads']);

Route::middleware(['auth'])->group(function(){
    Route::get('/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/store', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/edit/{slug}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::post('/edit/{slug}', [ArticleController::class, 'update'])->name('article.update');
    Route::post('/delete/{slug}', [ArticleController::class, 'destroy'])->name('article.destroy');
    Route::get('/portfolio/edit', [UserController::class, 'edit'])->name('portfolio.edit');
    Route::post('/portfolio/edit', [UserController::class, 'update'])->name('portfolio.update');
});

Route::get('/all', [ArticleController::class, 'all'])->name('welcome');
Route::get('/article/{slug}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/mine', [ArticleController::class, 'mine'])->name('article.mine');
Route::get('/profile', [UserController::class, 'index'])->name('profile.view');


Route::get('/profile-edit', [UserController::class, 'profile'])->name('profile.edit');
Route::post('/profile-user', [UserController::class, 'profileUserUpdate'])->name('profile.user');
Route::post('/profile-details', [UserController::class, 'profileDetailUpdate'])->name('profile.detail');
Route::post('/profile-skills', [UserController::class, 'profileSkillUpdate'])->name('profile.skill');




Route::get('/customization', [UserController::class, 'customization'])->name('customization.edit');
Route::post('/customization', [UserController::class, 'customizationUpdate'])->name('customization.update');
Route::get('/account', [UserController::class, 'account'])->name('account.edit');
Route::post('/account', [UserController::class, 'accountUpdate'])->name('account.update');





/*
Route::get('auth/linkedin', [SocialController::class, 'linkedinRedirect']);
Route::get('auth/linkedin/callback', [SocialController::class, 'linkedinCallback']);

Route::get('auth/facebook', [SocialController::class, 'facebookRedirect']);
Route::get('auth/facebook/callback', [SocialController::class, 'facebookCallback']);

Route::get('auth/twitter', [SocialController::class, 'twitterRedirect']);
Route::get('auth/twitter/callback', [SocialController::class, 'twitterCallback']);
*/

/*
Route::get('send-mail', function () {
    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];
    Mail::to('your_receiver_email@gmail.com')->send(new devMail($details));
    dd("Email is Sent.");
});
*/
