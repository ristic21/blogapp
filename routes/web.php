<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
Route::get('/createpost', function () {
    return view('createpost');
})->middleware('protect');

Route::get('/about', function () {
    return view('about');
});

Route::get('/signin', function () {
    return view('auth.signin');
})->middleware('loggedIn');

Route::get('/signup', function () {
    return view('auth.signup');
})->middleware('loggedIn');


Route::get('/posts', [PostController::class, 'index'])->middleware('protect');
Route::get('/posts/{id}', [PostController::class, 'show'])->middleware('protect');

Route::post('/createpost', [PostController::class, 'store'])->middleware('protect');
Route::post('/createcomment', [CommentController::class, 'store'])->middleware('protect');

Route::post('/signin', [AuthController::class, 'signIn']);
Route::post('/signup', [AuthController::class, 'signUp']);
Route::get('/signout', [AuthController::class, 'signOut']);

Route::get('/profile', [ProfileController::class, 'index']);