<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Livewire\Article\ArticleIndex;
use App\Http\Livewire\Event\Events;
use App\Http\Livewire\Settings;


Route::get('/', function () {
    return view('landing-page');
});
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', function () { return view('dashboard');})->name('dashboard');
    Route::get('/articles', ArticleIndex::class)->name('article.index');
    Route::resource('articles', ArticleController::class, ['only' => ['create', 'store', 'edit', 'update']]);
    Route::get('/events', Events::class)->name('events');
    Route::get('/settings', Settings::class)->name('settings');
});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('images', [App\Http\Controllers\ImageController::class, 'store'])->name('images.store');
    Route::post('upload/store', [App\Http\Controllers\FilepondController::class, 'store']);
    Route::get('upload/show', [App\Http\Controllers\FilepondController::class, 'show']);
});
