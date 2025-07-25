<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\AdminReviewController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\BusinessControlleer;
use App\Http\Controllers\ListingController;
// use App\Http\Controllers\MenuController;
use App\Http\Controllers\BusinessReviewController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\KhaltiController;
use App\Http\Controllers\MenuItemController;


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

Route::get('/', [FrontendController::class, 'home'])->name('index');

Route::get('/about', [FrontendController::class, 'About'])->name('about');
//-------------------------------------help for business---------------------------
// Route::get('/business/login', [FrontendController::class, 'Login'])->name('business.login');
Route::get('addbusiness', [FrontendController::class, 'addBusiness'])->name('addbusiness');
Route::get('claim', [FrontendController::class, 'Claim'])->name('claim');
Route::get('Explore', [FrontendController::class, 'explore'])->name('Explore');

//--------------------------------review and start project-----------------------
Route::get('review', [FrontendController::class, 'Review'])->name('review');
Route::get('project', [FrontendController::class, 'Project'])->name('project');

//------------------------------resturant----------------------------------------
Route::get('takeout', [FrontendController::class, 'Takeout'])->name('takeout');
Route::get('contractor', [FrontendController::class, 'Contractor'])->name('contractor');

// signup
Route::get('signup', [FrontendController::class, 'Signup'])->name('signup');
Route::post('signup/insert', [FrontendController::class, 'insert'])->name('insert');


// // signin in google
// // Redirect to Google
// Route::get('/auth/google/redirect', [SocilaiteController::class, 'redirectToGoogle'])->name('google.redirect');

// // Handle callback
// Route::get('/auth/google/callback', [SocilaiteController::class, 'handleGoogleCallback'])->name('google.callback');

// signin
Route::get('sigin', [FrontendController::class, 'Sigin'])->name('sigin');
Route::post('sigincheck', [FrontendController::class, 'SigninCheck'])->name('signincheck');

// Route::get('admin/dashboard', [FrontendController::class, 'Dashboard'])->name('dashboard');
// Route::get('dashboard', [FrontendController::class, 'dashboard'])->name('dashboard');

Auth::routes(['verify' => true]);


// Admin-only routes
Route::middleware(['auth', 'checkRole:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

// Business owner routes
Route::middleware(['auth', 'checkRole:businessowner'])->prefix('business')->group(function () {
    Route::get('/dashboard', [BusinessController::class, 'dashboard'])->name('businessdashboard.dashboard');
});
// User routes

// Shared route (e.g., admin + businessowner)
Route::middleware(['auth', 'checkRole:admin,businessowner'])->get('/reports', [ReportController::class, 'index'])->name('reports.index');


Route::get('/unauthorized', function () {
    return view('unauthorized');
})->name('unauthorized');




//businesss

Route::post('/business/store-detail', [BusinessController::class, 'storeDetail'])
->middleware('auth')
->name('business_storedetail');


// project quotes
Route::get('/repair', [BusinessController::class, 'Repairs'])
->middleware('auth')
->name('repair');

// project quotes
Route::get('/businessdetail/{id}', [BusinessController::class, 'Businessdetail'])->name('businessdetail');
Route::get('/businessdetailseemore', [BusinessController::class, 'Seemorephoto'])->name('seemorebusinessdetail');

Route::get('/business/addphoto', [BusinessController::class, 'businesssphoto'])->name('addphoto');
// Route::get('/business/review', [BusinessController::class, 'review'])->name('writereview');

//rewivew
// Show review form (GET)
Route::get('/business/{id}', [ReviewController::class, 'Businessreview'])
->middleware('auth')
->name('writereview');

// Handle review form submission (POST)
Route::post('/business', [ReviewController::class, 'submitReview'])->name('business.review.submit');


//upload photo

Route::get('/admin/editprofile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/admin/updateprofile', [ProfileController::class, 'update'])->name('profile.update');


//business upload photo
Route::get('/businesses/editprofile', [ProfileController::class, 'Upload'])->name('profile.Upload');
Route::put('/businesses/updateprofile', [ProfileController::class, 'UpdatePro'])->name('profile.UpdatePro');


Route::middleware(['auth', 'checkRole:admin'])->prefix('admin')->group(function () {
    Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{user}', [AdminUserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
});

//business update
Route::post('/admin/businesses/{id}/status', [BusinessController::class, 'updateStatus']);




Route::get('/upload', fn() => view('upload'))->name('upload.form');
Route::post('/upload-images', [PhotoController::class, 'store'])->name('images.upload');


// review manage

Route::middleware(['auth', 'checkRole:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/reviews', [AdminReviewController::class, 'index'])->name('reviews.index');
    Route::get('/reviews/{id}/edit', [AdminReviewController::class, 'edit'])->name('reviews.edit');
    Route::put('/reviews/{id}', [AdminReviewController::class, 'update'])->name('reviews.update');
    Route::delete('/reviews/{id}', [AdminReviewController::class, 'destroy'])->name('reviews.destroy');
});


//business manage


Route::middleware(['auth', 'checkRole:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('businesses', BusinessController::class);
});


//profile password
Route::put('/change-password', [ProfileController::class, 'updatePassword'])->name('password.update');

//payment gateway
Route::get('/admin/transactions', [PaymentController::class, 'transactions'])->name('admin.payment.transactions');


//advertisement\\
Route::get('/admin/advertisements', [AdvertisementController::class, 'index'])->middleware(['auth', 'admin'])->name('admin.advertisements.index');

Route::post('/admin/advertisements', [AdvertisementController::class, 'store'])->middleware(['auth', 'admin'])->name('admin.advertisements.store');

Route::get('/admin/advertisements/{id}/edit', [AdvertisementController::class, 'edit'])->middleware(['auth', 'admin'])->name('admin.advertisements.edit');

Route::put('/admin/advertisements/{id}', [AdvertisementController::class, 'update'])->middleware(['auth', 'admin'])->name('admin.advertisements.update');

Route::delete('/admin/advertisements/{id}', [AdvertisementController::class, 'destroy'])->middleware(['auth', 'admin'])->name('admin.advertisements.destroy');

Route::patch('/admin/advertisements/{id}/toggle-status', [AdvertisementController::class, 'toggleStatus'])->middleware(['auth', 'admin'])->name('admin.advertisements.toggleStatus');

//fevicon setting 
Route::get('/admin/settings', [SettingController::class, 'edit'])->name('admin.settings.edit');
Route::put('/admin/settings', [SettingController::class, 'update'])->name('admin.settings.update');





// Business owner routes

Route::middleware(['auth', 'checkRole:businessowner'])
    ->prefix('dashboard/business')
    ->name('businessdashboard.businessinfo.')
    ->group(function () {
        Route::get('/', [BusinessController::class, 'Businessindex'])->name('index');              // GET dashboard/business
        Route::get('/create', [BusinessController::class, 'Businesscreate'])->name('create');      // GET dashboard/business/create
        Route::post('/store', [BusinessController::class, 'Businessstore'])->name('store');        // POST dashboard/business/store

        Route::get('/{business}', [BusinessController::class, 'Businessshow'])->name('show');      // GET dashboard/business/{business}
        Route::get('/{business}/edit', [BusinessController::class, 'Businessedit'])->name('edit'); // GET dashboard/business/{business}/edit
        Route::put('/{business}', [BusinessController::class, 'Businessupdate'])->name('update');  // PUT dashboard/business/{business}
        Route::delete('/{business}', [BusinessController::class, 'Businessdestroy'])->name('destroy'); // DELETE dashboard/business/{business}
    });


//menu item

Route::middleware(['auth'])->group(function () {
    Route::resource('businessdashboard/menu', MenuItemController::class)->names([
        'index'   => 'businessdashboard.menu.index',
        'create'  => 'businessdashboard.menu.create',
        'store'   => 'businessdashboard.menu.store',
        'edit'    => 'businessdashboard.menu.edit',
        'update'  => 'businessdashboard.menu.update',
        'destroy' => 'businessdashboard.menu.destroy',
    ]);
});


//business reviews

// Grouped under 'businessdashboard' prefix (if you're using a dashboard layout or middleware)
Route::prefix('businessdashboard')->name('businessdashboard.')->middleware(['auth'])->group(function () {
    Route::get('/reviews', [BusinessReviewController::class, 'index'])->name('reviews.index');
    Route::get('/reviews/{id}/edit', [BusinessReviewController::class, 'edit'])->name('reviews.edit');
    Route::put('/reviews/{id}', [BusinessReviewController::class, 'update'])->name('reviews.update');
    Route::delete('/reviews/{id}', [BusinessReviewController::class, 'destroy'])->name('reviews.destroy');
});


Route::get('/search', [BusinessController::class, 'search'])->name('business.search');


Route::post('/forgot-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');


// //password reset
// Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
// Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');


// // Show reset form
// Route::get('/reset-password/{token}', function ($token) {
//     return view('auth.reset-password', ['token' => $token]);
// })->middleware('guest')->name('password.reset');

// // Handle reset form POST
// Route::post('/reset-password', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])
//     ->middleware('guest')
//     ->name('password.update');




Route::get('/review', [ReviewController::class, 'review'])->name('review.form');
Route::post('/review', [ReviewController::class, 'submitReview'])->name('review.submit');


//khalti integration

Route::prefix('businessdashboard')->middleware('auth')->name('businessdashboard.')->group(function () {
    Route::get('/payment/khalti', [KhaltiController::class, 'index'])->name('khalti.page');
    Route::post('/payment/khalti/verify', [KhaltiController::class, 'verify'])->name('khalti.verify');
});

