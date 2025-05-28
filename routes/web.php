<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;


use App\Http\Controllers\Backend\BannerHomeController;
use App\Http\Controllers\Backend\HomeIntroController;
use App\Http\Controllers\Backend\HomeChooseController;
use App\Http\Controllers\Backend\FooterController;
use App\Http\Controllers\Backend\AddProductController;
use App\Http\Controllers\Backend\ProductDescriptionController;
use App\Http\Controllers\Backend\ProductSpecificationsController;
use App\Http\Controllers\Backend\SpecificationsController;


use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductDetailsController;
use App\Http\Controllers\Frontend\ContactController;

// =========================================================================== Backend Routes

// Route::get('/', function () {
//     return view('frontend.index');
// });
  

// Authentication Routes
Route::get('/login', [LoginController::class, 'login'])->name('admin.login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('admin.authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
Route::get('/change-password', [LoginController::class, 'change_password'])->name('admin.changepassword');
Route::post('/update-password', [LoginController::class, 'updatePassword'])->name('admin.updatepassword');

Route::get('/register', [LoginController::class, 'register'])->name('admin.register');
Route::post('/register', [LoginController::class, 'authenticate_register'])->name('admin.register.authenticate');
    
// // Admin Routes with Middleware
Route::group(['middleware' => ['auth:web', \App\Http\Middleware\PreventBackHistoryMiddleware::class]], function () {
        Route::get('/dashboard', function () {
            return view('backend.dashboard'); 
        })->name('admin.dashboard');
});


// ==== Manage Home Page
Route::resource('banner-home', BannerHomeController::class);

// ==== Manage Introduction in Home Page
Route::resource('home-intro', HomeIntroController::class);

// ==== Manage Why choose in Home Page
Route::resource('home-why-choose', HomeChooseController::class);

// ==== Manage Footer
Route::resource('footer-contact', FooterController::class);

// ==== Manage Product Master
Route::resource('add-product', AddProductController::class);

// ==== Manage Product Description
Route::resource('product-descriptions', ProductDescriptionController::class);

// ==== Manage Product Specifications
Route::resource('product-specifications', ProductSpecificationsController::class);

// ==== Manage Specifications
Route::resource('manage-specifications', SpecificationsController::class);

Route::get('/get-case-styles/{productId}', [ProductSpecificationsController::class, 'getCaseStyles']);



// ===================================================================Frontend================================================================

Route::group(['prefix'=> '', 'middleware'=>[\App\Http\Middleware\PreventBackHistoryMiddleware::class]],function(){

    
    Route::get('/', [HomeController::class, 'index'])->name('home.page');
    Route::get('/specifications', [HomeController::class, 'specifications'])->name('show.specifications');
    Route::get('/contact-us', [ContactController::class, 'contact'])->name('contact.us');
    Route::post('/add-to-cart', [ProductDetailsController::class, 'add_to_cart'])->name('add.cart');
    Route::post('/cart', [ProductDetailsController::class, 'cart_details'])->name('cart.details');
    Route::get('/product-details/{slug}', [ProductDetailsController::class, 'show'])->name('product-details.show');
    Route::get('/{product_slug}/{case_style_slug}', [ProductDetailsController::class, 'case_style'])->name('productcase.style');


   
});