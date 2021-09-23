<?php

use App\Http\Controllers\FileUploadController;
use App\Mail\devMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialController;

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
