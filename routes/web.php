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
    
    // Admin FAQ Management
    Route::prefix('admin/faqs')->name('admin.faqs.')->group(function () {
        Route::get('/', [App\Http\Controllers\AdminFaqController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\AdminFaqController::class, 'create'])->name('create');
        Route::post('/', [App\Http\Controllers\AdminFaqController::class, 'store'])->name('store');
        Route::get('/{faq}/edit', [App\Http\Controllers\AdminFaqController::class, 'edit'])->name('edit');
        Route::put('/{faq}', [App\Http\Controllers\AdminFaqController::class, 'update'])->name('update');
        Route::delete('/{faq}', [App\Http\Controllers\AdminFaqController::class, 'destroy'])->name('destroy');
        Route::post('/bulk-delete', [App\Http\Controllers\AdminFaqController::class, 'bulkDelete'])->name('bulk-delete');
    });
    
    // Admin Testimonial Management
    Route::prefix('admin/testimonials')->name('admin.testimonials.')->group(function () {
        Route::get('/', [App\Http\Controllers\AdminTestimonialController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\AdminTestimonialController::class, 'create'])->name('create');
        Route::post('/', [App\Http\Controllers\AdminTestimonialController::class, 'store'])->name('store');
        Route::get('/{testimonial}/edit', [App\Http\Controllers\AdminTestimonialController::class, 'edit'])->name('edit');
        Route::put('/{testimonial}', [App\Http\Controllers\AdminTestimonialController::class, 'update'])->name('update');
        Route::delete('/{testimonial}', [App\Http\Controllers\AdminTestimonialController::class, 'destroy'])->name('destroy');
        Route::post('/bulk-delete', [App\Http\Controllers\AdminTestimonialController::class, 'bulkDelete'])->name('bulk-delete');
    });
    
    // Admin Portfolio Management
    Route::prefix('admin/portfolios')->name('admin.portfolios.')->group(function () {
        Route::get('/', [App\Http\Controllers\AdminPortfolioController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\AdminPortfolioController::class, 'create'])->name('create');
        Route::post('/', [App\Http\Controllers\AdminPortfolioController::class, 'store'])->name('store');
        Route::get('/{portfolio}/edit', [App\Http\Controllers\AdminPortfolioController::class, 'edit'])->name('edit');
        Route::put('/{portfolio}', [App\Http\Controllers\AdminPortfolioController::class, 'update'])->name('update');
        Route::delete('/{portfolio}', [App\Http\Controllers\AdminPortfolioController::class, 'destroy'])->name('destroy');
        Route::post('/bulk-delete', [App\Http\Controllers\AdminPortfolioController::class, 'bulkDelete'])->name('bulk-delete');
    });
    
    // Admin Portfolio Category Management
    Route::prefix('admin/portfolio-categories')->name('admin.portfolio-categories.')->group(function () {
        Route::get('/', [App\Http\Controllers\AdminPortfolioCategoryController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\AdminPortfolioCategoryController::class, 'create'])->name('create');
        Route::post('/', [App\Http\Controllers\AdminPortfolioCategoryController::class, 'store'])->name('store');
        Route::get('/{portfolioCategory}/edit', [App\Http\Controllers\AdminPortfolioCategoryController::class, 'edit'])->name('edit');
        Route::put('/{portfolioCategory}', [App\Http\Controllers\AdminPortfolioCategoryController::class, 'update'])->name('update');
        Route::delete('/{portfolioCategory}', [App\Http\Controllers\AdminPortfolioCategoryController::class, 'destroy'])->name('destroy');
        Route::post('/bulk-delete', [App\Http\Controllers\AdminPortfolioCategoryController::class, 'bulkDelete'])->name('bulk-delete');
    });
    
    // Admin Pricing Plan Management
    Route::prefix('admin/pricing-plans')->name('admin.pricing-plans.')->group(function () {
        Route::get('/', [App\Http\Controllers\AdminPricingPlanController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\AdminPricingPlanController::class, 'create'])->name('create');
        Route::post('/', [App\Http\Controllers\AdminPricingPlanController::class, 'store'])->name('store');
        Route::get('/{pricingPlan}/edit', [App\Http\Controllers\AdminPricingPlanController::class, 'edit'])->name('edit');
        Route::put('/{pricingPlan}', [App\Http\Controllers\AdminPricingPlanController::class, 'update'])->name('update');
        Route::delete('/{pricingPlan}', [App\Http\Controllers\AdminPricingPlanController::class, 'destroy'])->name('destroy');
        Route::post('/bulk-delete', [App\Http\Controllers\AdminPricingPlanController::class, 'bulkDelete'])->name('bulk-delete');
    });
});

require __DIR__.'/auth.php';
