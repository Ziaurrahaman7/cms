<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Public blog routes
Route::get('/blog', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
Route::get('/blog/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('posts.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/content', [App\Http\Controllers\AdminController::class, 'content'])->name('admin.content');
    Route::post('/admin/content', [App\Http\Controllers\AdminController::class, 'updateContent'])->name('admin.content.update');
    
    // Admin Posts Management
    Route::prefix('admin/posts')->name('admin.posts.')->group(function () {
        Route::get('/', [App\Http\Controllers\AdminPostController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\AdminPostController::class, 'create'])->name('create');
        Route::post('/', [App\Http\Controllers\AdminPostController::class, 'store'])->name('store');
        Route::get('/{post}/edit', [App\Http\Controllers\AdminPostController::class, 'edit'])->name('edit');
        Route::put('/{post}', [App\Http\Controllers\AdminPostController::class, 'update'])->name('update');
        Route::delete('/{post}', [App\Http\Controllers\AdminPostController::class, 'destroy'])->name('destroy');
        Route::post('/bulk-delete', [App\Http\Controllers\AdminPostController::class, 'bulkDelete'])->name('bulk-delete');
    });
    
    // Admin Team Management
    Route::prefix('admin/teams')->name('admin.teams.')->group(function () {
        Route::get('/', [App\Http\Controllers\AdminTeamController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\AdminTeamController::class, 'create'])->name('create');
        Route::post('/', [App\Http\Controllers\AdminTeamController::class, 'store'])->name('store');
        Route::get('/{team}/edit', [App\Http\Controllers\AdminTeamController::class, 'edit'])->name('edit');
        Route::put('/{team}', [App\Http\Controllers\AdminTeamController::class, 'update'])->name('update');
        Route::delete('/{team}', [App\Http\Controllers\AdminTeamController::class, 'destroy'])->name('destroy');
        Route::post('/bulk-delete', [App\Http\Controllers\AdminTeamController::class, 'bulkDelete'])->name('bulk-delete');
    });
});

require __DIR__.'/auth.php';
