<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\AdminReviewController;



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


//-------------------------------------help for business---------------------------
Route::get('/business/login', [FrontendController::class, 'Login'])->name('business-login');
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
Route::middleware(['auth', 'role:Admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

// Business owner routes
Route::middleware(['auth', 'role:Business Owner'])->prefix('business')->group(function () {
    Route::get('/dashboard', [BusinessController::class, 'dashboard'])->name('businessdashboard.dashboard');
});

// User routes
Route::middleware(['auth', 'role:User'])->group(function () {
    Route::get('/index', [UserController::class, 'dashboard'])->name('index');
});

// Shared route (e.g., admin + businessowner)
Route::middleware(['auth', 'role:Admin,businessowner'])->get('/reports', [ReportController::class, 'index'])->name('reports.index');


Route::get('/unauthorized', function () {
    return view('unauthorized');
})->name('unauthorized');




//businesss
Route::post('/business', [BusinessController::class, 'business_store'])->name('business.business_store');


// project quotes
Route::get('/repair', [BusinessController::class, 'Repairs'])->name('repair');

// project quotes
Route::get('/businessdetail', [BusinessController::class, 'Businessdetail'])->name('businessdetail');
Route::get('/businessdetailseemore', [BusinessController::class, 'Seemorephoto'])->name('seemorebusinessdetail');
Route::get('/business/addphoto', [BusinessController::class, 'businesssphoto'])->name('addphoto');
Route::get('/business/review', [BusinessController::class, 'review'])->name('writereview');

//rewivew
Route::get('/business/review', [ReviewController::class, 'review'])->name('writereview');

Route::post('/business/review', [ReviewController::class, 'submitReview'])->name('review');


//upload photo

Route::get('/admin/editprofile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/admin/updateprofile', [ProfileController::class, 'update'])->name('profile.update');


Route::middleware(['auth', 'role:Admin'])->prefix('admin')->group(function () {
    Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{user}', [AdminUserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
});

Route::get('/upload', fn() => view('upload'));
Route::post('/upload-images', [PhotoController::class, 'store'])->name('images.upload');

// review manage

Route::middleware(['auth', 'role:Admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/reviews', [AdminReviewController::class, 'index'])->name('reviews.index');
    Route::get('/reviews/{id}/edit', [AdminReviewController::class, 'edit'])->name('reviews.edit');
    Route::put('/reviews/{id}', [AdminReviewController::class, 'update'])->name('reviews.update');
    Route::delete('/reviews/{id}', [AdminReviewController::class, 'destroy'])->name('reviews.destroy');
});


//business manage


Route::middleware(['auth', 'role:Admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('businesses', BusinessController::class);
});
