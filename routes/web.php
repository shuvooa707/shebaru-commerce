<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\UserOrderController;
use App\Http\Controllers\Frontend\UserAccountDetailsController;
use App\Http\Controllers\Frontend\UserWishlistController;
use App\Http\Controllers\Frontend\ProductReviewController;



// Client Auth
Auth::routes();


/** Client Side **/
Route::group(['as' => 'front.'], function () {

    /** Authentication Routes **/
    Route::controller(AuthController::class)->group(function () {
        Route::post('/user-login', 'login')->name('login');
        Route::get('/seller-register', 'sellerRegister')->name('sellerRegister');
        Route::post('/seller-register-post', 'sellerRegisterPost')->name('sellerRegisterPost');
        Route::post('/user-register', 'Register')->name('register');

        Route::get('/get-otp', 'getOpt')->name('getOpt');
        Route::post('/otp-verify', 'optVerify')->name('optVerify');
    });

    /** Order Routes **/
    Route::resource('orders', UserOrderController::class);


    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'home')->name('home');
        Route::get('/about-us', 'aboutUs')->name('aboutUs');
        Route::get('/contact-us', 'contactUs')->name('contactUs');
        Route::get('/careers', 'career')->name('career');
        Route::get('/privacy-policy', 'privacyPolicy')->name('privacyPolicy');
        Route::get('/term-condition', 'termCondition')->name('termCondition');
        Route::get('/return-policy', 'returnPolicy')->name('returnPolicy');
        Route::get('/faq', 'faq')->name('faq');
        Route::get('/send-sms', 'sendSMs')->name('sendSMs');
        Route::post('/contacts', 'contact')->name('contact');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('/products-list', 'index')->name('products.index');
        Route::get('/category', 'categories')->name('categories');
        Route::get('/c/{slug}', 'subCategories')->name('subCategories');
        Route::get('/brands', 'brands')->name('brands');
        Route::get('/discount-products', 'discountProduct')->name('discountProduct');
        Route::get('/product-show/{id}', 'show')->name('products.show');
        Route::get('/relative-product/{id}', 'relativeProduct')->name('products.relativeProduct');

        Route::get('/combo-products', 'comboProducts')->name('combo_products');
        Route::get('/get-trending-products', 'trendingProduct')->name('trendingProduct');
        Route::get('/get-hotdeal-products', 'hotdealProduct')->name('hotdealProduct');
        Route::get('/get-recommended-products', 'recommendedProduct')->name('recommendedProduct');
        Route::get('view-landing-page/{id}', 'landing_page')->name('landing_pages.view_page');
        Route::get('/free-shipping-product', 'free_shipping')->name('free-shipping');
        Route::get('/get-variation_price', 'get_variation_price')->name('get-variation_price');

    });

    Route::group(['middleware' => 'auth'], function () {
        Route::resource('dashboard', DashboardController::class);
        //Route::resource('orders',UserOrderController::class);
        Route::resource('account_details', UserAccountDetailsController::class);
        Route::resource('wishlist', UserWishlistController::class);
        Route::resource('product-reviews', ProductReviewController::class);

    });

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/confirm-order/{id}', 'confirmOrder')->name('confirmOrder');
        Route::get('/confirm-order-landing/{id}', 'confirmOrderlanding')->name('confirmOrderlanding');
    });


    Route::resource('/carts', CartController::class);
    Route::post('/cart/store', [CartController::class, 'storeCart'])->name('carts.storeCart');
    Route::get('/cart/clear-all', [CartController::class, 'clearAll'])->name('carts.clearAll');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/coupon-discount', [CheckoutController::class, 'getCouponDiscount'])->name('getCouponDiscount');
    });
    Route::resource('/checkouts', CheckoutController::class);
    Route::post('store-data', [CheckoutController::class, 'storeData'])->name('storeData');
    Route::post('/store/checkout', [CheckoutController::class, 'StoreChk'])->name('store.checkout');

    Route::post('/store/landing/data', [CheckoutController::class, 'storelandData'])->name('storelandData');

});



Route::get('/search', [PostController::class, 'search']);



require_once "admin.routes.php";
require_once "tools.routes.php";
