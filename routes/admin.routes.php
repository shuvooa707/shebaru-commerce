<?php


use App\Http\Controllers\Backend\FeaturedSliderController;
use App\Http\Controllers\Backend\VendorController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

//backend
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\TypeController;
use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\Backend\HomeSectionImageController;
use App\Http\Controllers\Backend\ProductDiscountController;
use App\Http\Controllers\Backend\PurchaseController;
use App\Http\Controllers\Backend\AboutUsController;
use App\Http\Controllers\Backend\CareerController;
use App\Http\Controllers\Backend\SocialIconController;
use App\Http\Controllers\Backend\SupplierController;
use App\Http\Controllers\Backend\ComboController;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\DeliveryChargeController;
use App\Http\Controllers\Backend\OrderPaymentController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\LandingPageController;
use App\Http\Controllers\Backend\CouponCodeController;
use App\Http\Controllers\Backend\CourierController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\InformationController;
use App\Http\Controllers\Backend\IPBlockController;

use App\Http\Controllers\Auth\ResetPasswordController;



// Admin Auth
Route::controller(AuthController::class)->group(function () {
    Route::get('/admin', 'login')->name('admin.login');
    Route::post('/admin-login', 'postLogin')->name('admin.postLogin');
});

/** Admin Dashboard **/
Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'as' => 'admin.'], function () {

    /** ip routes **/
    Route::get('/ip-block', [IPBlockController::class, 'index'])->name('ipblock');
    Route::get('/ip-block/delete/{id}', [IPBlockController::class, 'delete'])->name('ipblock.delete');
    Route::get('/ip-block/edit/{id}', [IPBlockController::class, 'edit'])->name('ipblock.edit');
    Route::put('/ip-block/update/{id}', [IPBlockController::class, 'update'])->name('ipblock.update');
    Route::post('/ip-block-submit', [IPBlockController::class, 'IPBlockSubmit'])->name('ipblock.submit');


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/get-dashboard-data', [DashboardController::class, 'getDashboardData'])->name('getDashboardData');

    Route::post('/file-upload', [ProductController::class, 'fileUpload'])->name('ckeditor.upload');
    Route::get('/file-delete/{id}', [ProductController::class, 'deleteImage'])->name('deleteImage');
    Route::get('/get-sub-category', [ProductController::class, 'getSubcategory'])->name('getSubcategory');
    Route::get('/product-export', [ProductController::class, 'productExport'])->name('productExport');

    Route::controller(OrderController::class)->group(function () {

        Route::get('/order-status/{id}', 'orderStatus')->name('orderStatus');
        Route::post('/order-status/update/{id}', 'orderStatusUPdate')->name('orderStatusUPdate');
        //

        Route::get('/get-order-product', 'getOrderProduct')->name('getOrderProduct');
        Route::get('/get-order-product2', 'getOrderProduct2')->name('getOrderProduct2');
        Route::get('/order-product-entry', 'orderProductEntry')->name('orderProductEntry');
        Route::get('/landing-product-entry', 'landingProductEntry')->name('landingProductEntry');
        Route::get('/order-export', 'orderExport')->name('orderExport');

        Route::get('/assign-user', 'assignUser')->name('assignUser');
        Route::get('/order-status-opdate', 'orderStatusUpdateMulti')->name('orderStatusUpdateMulti');
        Route::get('/all-order-delete', 'deleteAllOrder')->name('deleteAllOrder');
        Route::get('/order-list', 'orderList')->name('orderList');
        Route::view('/print_multiple', 'backend.reports.print');

        Route::get('/status-wise-order', 'status_wise_order')->name('status_wise_order');
        Route::get('/search-order', 'searchOrder')->name('searchOrder');

        Route::get('/assign-user-store', 'assignUserStore')->name('assignUserStore');
        Route::get('/multi-order-status-update-store', 'multuOrderStatusUpdate')->name('multuOrderStatusUpdate');

        //Redx Courier Service
        Route::get('/create-redx-parcel', 'OrderSendToRedx')->name('createRedxParcel');

        //Pathao Courier Service
        Route::get('/zones-by-city/{city}', 'getPathaoZoneListByCity')->name('zonesByCity');
        Route::get('/areas-by-zone/{zone}', 'getPathaoAreaListByZone')->name('areasByZone');
        Route::get('/create-pathao-parcel', 'OrderSendToPathao')->name('createPathaoParcel');

        //Steadfast Courier Service
        Route::get('/create-steadfast-parcel', 'OrderSendToSteadfast')->name('createSteadfastParcel');

        //generate pathao access token
        Route::get('generate-access-token', 'viewAccessToken');
        Route::post('generate-access-token', 'generatePathaoAccessToken')->name('generatePathaoAccessToken');

    });

    Route::get('/recommended-update', [ProductController::class, 'recommendedUpdate'])->name('recommendedUpdate');
    Route::get('/product-copy/{id}', [ProductController::class, 'productCopy'])->name('productCopy');

    Route::resource('products', ProductController::class);

    Route::get('/popular-category', [CategoryController::class, 'popularCatgeory'])->name('popularCatgeory');
    Route::resource('categories', CategoryController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('featured-sliders', FeaturedSliderController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('users', UsersController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);

    Route::get('/top-brand-update', [TypeController::class, 'topBrandUpdate'])->name('topBrandUpdate');
    Route::resource('types', TypeController::class);
    Route::resource('vendors', VendorController::class);
    Route::resource('sizes', SizeController::class);
    Route::resource('purchase', PurchaseController::class);
    Route::resource('about_us', AboutUsController::class);
    Route::resource('career', CareerController::class);
    Route::resource('suppliers', SupplierController::class);
    Route::resource('combos', ComboController::class);
    Route::resource('colors', ColorController::class);
    Route::resource('pages', PageController::class);
    Route::resource('landing_pages', LandingPageController::class);
    Route::get('landing-page/{id}', [PageController::class, 'landing_page'])->name('landing_index');
    Route::get('delete-slider-image/{id}', [LandingPageController::class, 'delete_slider'])->name('delete_slider');
    Route::post('store-data', [LandingPageController::class, 'storeData'])->name('landing_pages.storeData');

    Route::resource('couriers', CourierController::class);
    Route::resource('social-icons', SocialIconController::class, ['names' => 'social_icons']);
    Route::resource('order-payments', OrderPaymentController::class, ['names' => 'order_payments']);
    Route::resource('delivery-charges', DeliveryChargeController::class, ['names' => 'delivery_charge']);
    Route::resource('coupon-codes', CouponCodeController::class, ['names' => 'coupon_codes']);

    Route::get('/user-status-update', [UsersController::class, 'userStatusUpdate'])->name('userStatusUpdate');
    Route::resource('/home-section-images', HomeSectionImageController::class, ['names' => 'home_section_images']);
    Route::resource('/product-discounts', ProductDiscountController::class, ['names' => 'product_discounts']);


    Route::get('/free-shipping-product', [ProductDiscountController::class, 'free_shipping'])->name('free_shipping');
    Route::get('/create-free-shipping-product', [ProductDiscountController::class, 'create_free_shipping'])->name('create_free_shipping');
    Route::post('/store-free-shipping', [ProductDiscountController::class, 'store_free_shipping'])->name('store-free-shipping');
    Route::get('/destroy-free-shipping', [ProductDiscountController::class, 'fshippingdestroy'])->name('free-shipping.fshippingdestroy');


    Route::get('/get-discount-product', [ProductDiscountController::class, 'getDiscountProduct'])->name('getDiscountProduct');
    Route::get('/product-entry', [ProductDiscountController::class, 'productEntry'])->name('productEntry');
    Route::get('/free-shipping-product-entry', [ProductDiscountController::class, 'productEntry2'])->name('productEntry2');

    Route::get('/get-purchase-product', [PurchaseController::class, 'getPurchaseProduct'])->name('getPurchaseProduct');
    Route::get('/purchase-product-entry', [PurchaseController::class, 'purchaseProductEntry'])->name('purchaseProductEntry');


    //Report Section

    //Order Report
    Route::group(['as' => 'report.'], function () {
        Route::controller(ReportController::class)->group(function () {
            Route::get('/order-report', 'orderReport')->name('order');


            Route::get('/product-report', 'productReport')->name('product');
            Route::get('/order-search', 'filterOrder')->name('order.search');
            Route::get('/product-search', 'filterProduct')->name('product.search');
            Route::get('/export-order-report', 'exportOrderReport')->name('order.export');
        });
    });

    Route::resource('settings', InformationController::class);

    //Update Profile
    Route::controller(InformationController::class)->group(function () {
        Route::get('/profile', 'showProfile')->name('profile');
        Route::post('/profile-update', 'updateProfile')->name('profile.update');
        Route::get('/status-coupon', 'statusCoupon')->name('status.coupon');
    });

    //Change Password
    Route::controller(ResetPasswordController::class)->group(function () {
        Route::get('/change-password', 'show')->name('password');
        Route::post('/update-password', 'updatePassword')->name('password.update');
    });

});
