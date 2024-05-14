<?php

use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::middleware('auth')->group(function () {
Route::get('/dashboard', [BlogController::class, 'dashboard']);
Route::get('/create-post', [BlogController::class, 'create']);
Route::post('/blogs-store', [BlogController::class, 'store']);
Route::get('/blogs-show', [BlogController::class, 'show']);
Route::get('/blogs-edit/{id}', [BlogController::class, 'edit']);
Route::post('/blogs-update/{id}', [BlogController::class, 'update']);
Route::get('/blogs-delete/{id}', [BlogController::class, 'delete']);


Route::get('/logout', [BlogController::class, 'logout']);

});




// frontend
Route::get('/', [UserController::class, 'index']);
Route::get('/single-blog/{id}', [UserController::class, 'single']);
Route::post('/comment', [UserController::class, 'comment']);
Route::get('/delete-comment/{id}', [UserController::class, 'comment_delete']);

