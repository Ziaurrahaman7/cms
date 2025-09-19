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

// About Us page
Route::get('/about-us', [App\Http\Controllers\AboutController::class, 'index'])->name('about.index');

// Case Study page
Route::get('/case-study', [App\Http\Controllers\CaseStudyController::class, 'index'])->name('case-study.index');
Route::get('/case-study/{portfolio}', [App\Http\Controllers\CaseStudyController::class, 'show'])->name('case-study.show');

// Services page
Route::get('/services', [App\Http\Controllers\ServicePageController::class, 'index'])->name('services.index');

// Contact Us page
Route::get('/contact', [App\Http\Controllers\ContactPageController::class, 'index'])->name('contact.index');

// Clients page
Route::get('/clients', [App\Http\Controllers\ClientPageController::class, 'index'])->name('clients.index');

// Public service routes
Route::get('/services/{slug}', [App\Http\Controllers\ServiceController::class, 'show'])->name('services.show');

// Public product routes
Route::get('/products/{slug}', [App\Http\Controllers\ProductController::class, 'show'])->name('products.show');

// Partners page
Route::get('/partners', [App\Http\Controllers\PartnerController::class, 'index'])->name('partners.index');
Route::get('/partners/{partner}', [App\Http\Controllers\PartnerController::class, 'show'])->name('partners.show');

// Contact form
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');

// Job application
Route::post('/job-apply', [App\Http\Controllers\JobApplicationController::class, 'store'])->name('job.apply');

// Careers page
Route::get('/careers', [App\Http\Controllers\CareerController::class, 'index'])->name('careers.index');

Route::middleware('auth')->group(function () {
    
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
    
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
    
    // Admin Service Management
    Route::prefix('admin/services')->name('admin.services.')->group(function () {
        Route::get('/', [App\Http\Controllers\AdminServiceController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\AdminServiceController::class, 'create'])->name('create');
        Route::post('/', [App\Http\Controllers\AdminServiceController::class, 'store'])->name('store');
        Route::get('/{service}/edit', [App\Http\Controllers\AdminServiceController::class, 'edit'])->name('edit');
        Route::put('/{service}', [App\Http\Controllers\AdminServiceController::class, 'update'])->name('update');
        Route::delete('/{service}', [App\Http\Controllers\AdminServiceController::class, 'destroy'])->name('destroy');
        Route::post('/bulk-delete', [App\Http\Controllers\AdminServiceController::class, 'bulkDelete'])->name('bulk-delete');
    });
    
    // Admin Client Management
    Route::prefix('admin/clients')->name('admin.clients.')->group(function () {
        Route::get('/', [App\Http\Controllers\AdminClientController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\AdminClientController::class, 'create'])->name('create');
        Route::post('/', [App\Http\Controllers\AdminClientController::class, 'store'])->name('store');
        Route::get('/{client}/edit', [App\Http\Controllers\AdminClientController::class, 'edit'])->name('edit');
        Route::put('/{client}', [App\Http\Controllers\AdminClientController::class, 'update'])->name('update');
        Route::delete('/{client}', [App\Http\Controllers\AdminClientController::class, 'destroy'])->name('destroy');
        Route::post('/bulk-delete', [App\Http\Controllers\AdminClientController::class, 'bulkDelete'])->name('bulk-delete');
    });
    
    // Admin Site Settings
    Route::prefix('admin/site-settings')->name('admin.site-settings.')->group(function () {
        Route::get('/', [App\Http\Controllers\AdminSiteSettingController::class, 'index'])->name('index');
        Route::post('/update', [App\Http\Controllers\AdminSiteSettingController::class, 'update'])->name('update');
        Route::post('/seed', [App\Http\Controllers\AdminSiteSettingController::class, 'seed'])->name('seed');
    });
    
    // Admin Feature Management
    Route::prefix('admin/features')->name('admin.features.')->group(function () {
        Route::get('/', [App\Http\Controllers\AdminFeatureController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\AdminFeatureController::class, 'create'])->name('create');
        Route::post('/', [App\Http\Controllers\AdminFeatureController::class, 'store'])->name('store');
        Route::get('/{feature}/edit', [App\Http\Controllers\AdminFeatureController::class, 'edit'])->name('edit');
        Route::put('/{feature}', [App\Http\Controllers\AdminFeatureController::class, 'update'])->name('update');
        Route::delete('/{feature}', [App\Http\Controllers\AdminFeatureController::class, 'destroy'])->name('destroy');
    });
    
    // Admin Contact Management
    Route::prefix('admin/contacts')->name('admin.contacts.')->group(function () {
        Route::get('/', [App\Http\Controllers\AdminContactController::class, 'index'])->name('index');
        Route::get('/{contact}', [App\Http\Controllers\AdminContactController::class, 'show'])->name('show');
        Route::patch('/{contact}/status', [App\Http\Controllers\AdminContactController::class, 'updateStatus'])->name('update-status');
        Route::delete('/{contact}', [App\Http\Controllers\AdminContactController::class, 'destroy'])->name('destroy');
    });
    
    // Admin Achievement Management
    Route::prefix('admin/achievements')->name('admin.achievements.')->group(function () {
        Route::get('/', [App\Http\Controllers\AdminAchievementController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\AdminAchievementController::class, 'create'])->name('create');
        Route::post('/', [App\Http\Controllers\AdminAchievementController::class, 'store'])->name('store');
        Route::get('/{achievement}/edit', [App\Http\Controllers\AdminAchievementController::class, 'edit'])->name('edit');
        Route::put('/{achievement}', [App\Http\Controllers\AdminAchievementController::class, 'update'])->name('update');
        Route::delete('/{achievement}', [App\Http\Controllers\AdminAchievementController::class, 'destroy'])->name('destroy');
    });
    
    // Admin Product Management
    Route::prefix('admin/products')->name('admin.products.')->group(function () {
        Route::get('/', [App\Http\Controllers\AdminProductController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\AdminProductController::class, 'create'])->name('create');
        Route::post('/', [App\Http\Controllers\AdminProductController::class, 'store'])->name('store');
        Route::get('/{product}/edit', [App\Http\Controllers\AdminProductController::class, 'edit'])->name('edit');
        Route::put('/{product}', [App\Http\Controllers\AdminProductController::class, 'update'])->name('update');
        Route::delete('/{product}', [App\Http\Controllers\AdminProductController::class, 'destroy'])->name('destroy');
    });
    
    // Admin Industry Management
    Route::prefix('admin/industries')->name('admin.industries.')->group(function () {
        Route::get('/', [App\Http\Controllers\AdminIndustryController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\AdminIndustryController::class, 'create'])->name('create');
        Route::post('/', [App\Http\Controllers\AdminIndustryController::class, 'store'])->name('store');
        Route::get('/{industry}/edit', [App\Http\Controllers\AdminIndustryController::class, 'edit'])->name('edit');
        Route::put('/{industry}', [App\Http\Controllers\AdminIndustryController::class, 'update'])->name('update');
        Route::delete('/{industry}', [App\Http\Controllers\AdminIndustryController::class, 'destroy'])->name('destroy');
    });
    
    // Admin Partner Management
    Route::prefix('admin/partners')->name('admin.partners.')->group(function () {
        Route::get('/', [App\Http\Controllers\AdminPartnerController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\AdminPartnerController::class, 'create'])->name('create');
        Route::post('/', [App\Http\Controllers\AdminPartnerController::class, 'store'])->name('store');
        Route::get('/{partner}/edit', [App\Http\Controllers\AdminPartnerController::class, 'edit'])->name('edit');
        Route::put('/{partner}', [App\Http\Controllers\AdminPartnerController::class, 'update'])->name('update');
        Route::delete('/{partner}', [App\Http\Controllers\AdminPartnerController::class, 'destroy'])->name('destroy');
    });
    
    // Admin Job Management
    Route::prefix('admin/jobs')->name('admin.jobs.')->group(function () {
        Route::get('/', [App\Http\Controllers\AdminJobController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\AdminJobController::class, 'create'])->name('create');
        Route::post('/', [App\Http\Controllers\AdminJobController::class, 'store'])->name('store');
        Route::get('/{job}/edit', [App\Http\Controllers\AdminJobController::class, 'edit'])->name('edit');
        Route::put('/{job}', [App\Http\Controllers\AdminJobController::class, 'update'])->name('update');
        Route::delete('/{job}', [App\Http\Controllers\AdminJobController::class, 'destroy'])->name('destroy');
    });
    
    // Admin Job Applications Management
    Route::prefix('admin/job-applications')->name('admin.job-applications.')->group(function () {
        Route::get('/', [App\Http\Controllers\AdminJobApplicationController::class, 'index'])->name('index');
        Route::get('/{jobApplication}', [App\Http\Controllers\AdminJobApplicationController::class, 'show'])->name('show');
        Route::patch('/{jobApplication}/status', [App\Http\Controllers\AdminJobApplicationController::class, 'updateStatus'])->name('update-status');
        Route::get('/{jobApplication}/download-cv', [App\Http\Controllers\AdminJobApplicationController::class, 'downloadCv'])->name('download-cv');
        Route::delete('/{jobApplication}', [App\Http\Controllers\AdminJobApplicationController::class, 'destroy'])->name('destroy');
    });
});

require __DIR__.'/auth.php';
