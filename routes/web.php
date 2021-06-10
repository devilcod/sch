<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Livewire\Event\Events;
use App\Http\Livewire\Settings;
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
Route::middleware(['auth', 'verified'])->group(function () {
    // Route::get('articles', [App\Http\Controllers\ArticleController::class, 'index'])->name('article.index');
    // Route::get('article/create', [App\Http\Controllers\ArticleController::class, 'create'])->name('article.create');
    // Route::post('article/store', [App\Http\Controllers\ArticleController::class, 'store'])->name('article.store');
    Route::resource('articles', ArticleController::class);
    Route::get('/events', Events::class)->name('events');
    Route::get('/settings', Settings::class)->name('settings');
    Route::post('images', [App\Http\Controllers\ImageController::class, 'store'])->name('images.store');
    Route::post('upload', [App\Http\Controllers\FilepondController::class, 'store']);
});
