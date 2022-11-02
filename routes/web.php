<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// frontend route start
Route::middleware(['auth'])->group(function () {
    Route::get('cart', [App\Http\Controllers\Frontend\CartController::class, 'viewcart']);
    Route::get('load-cart-data', [App\Http\Controllers\Frontend\CartController::class, 'cartcount']);
    Route::get('wishlist', [App\Http\Controllers\Frontend\WishlistController::class, 'viewwishlist']);
    Route::get('load-wishlist-data', [App\Http\Controllers\Frontend\WishlistController::class, 'wishlistcount']);
    Route::get('checkout', [App\Http\Controllers\Frontend\CheckoutController::class, 'index']);
    Route::post('place-order', [App\Http\Controllers\Frontend\CheckoutController::class, 'placeorder']);
    Route::get('stripecheckout', [App\Http\Controllers\Frontend\CheckoutController::class, 'stripeindex']);
    Route::post('stripe-order', [App\Http\Controllers\Frontend\CheckoutController::class, 'stripeorder']);
    Route::get('paystackcheckout', [App\Http\Controllers\Frontend\CheckoutController::class, 'paystackindex']);
    Route::post('paystack-order', [App\Http\Controllers\Frontend\CheckoutController::class, 'paystackorder']);
    Route::get('thankyou', [App\Http\Controllers\Frontend\CheckoutController::class, 'thankyou']);
    Route::get('thankyous', [App\Http\Controllers\Frontend\CheckoutController::class, 'payment_callback']);
    Route::get('my-orders', [App\Http\Controllers\Frontend\UserController::class, 'index']);
    Route::get('view-order/{id}', [App\Http\Controllers\Frontend\UserController::class, 'view']);
    Route::post('add-rating', [App\Http\Controllers\Frontend\RatingController::class, 'add']);
    Route::get('add-review/{product_slug}/userreview', [App\Http\Controllers\Frontend\ReviewController::class, 'add']);
    Route::post('add-review', [App\Http\Controllers\Frontend\ReviewController::class, 'create']);
    Route::get('edit-review/{product_slug}/userreview', [App\Http\Controllers\Frontend\ReviewController::class, 'edit']);
    Route::put('update-review', [App\Http\Controllers\Frontend\ReviewController::class, 'update']);
    Route::get('setting', [App\Http\Controllers\Frontend\SettingController::class, 'index']);
    Route::post('settings', [App\Http\Controllers\Frontend\SettingController::class, 'settings']);
    Route::get('contact', [App\Http\Controllers\Frontend\EmailController::class, 'contact']);
    Route::post('contacts', [App\Http\Controllers\Frontend\EmailController::class, 'contactsendemail']);
    Route::get('about', [App\Http\Controllers\Frontend\FrontendController::class, 'about']);
    Route::get('user/password', [App\Http\Controllers\Frontend\SettingController::class, 'cpassword']);
    Route::get('admin/password', [App\Http\Controllers\Frontend\SettingController::class, 'adminpassword']);
    Route::post('password/update', [App\Http\Controllers\Frontend\SettingController::class, 'upassword']);
    Route::post('sms', [App\Http\Controllers\Frontend\CheckoutController::class, 'sendsms']);
});
Route::post('add-to-cart', [App\Http\Controllers\Frontend\CartController::class, 'addproduct']);
Route::post('delete-cart-item', [App\Http\Controllers\Frontend\CartController::class, 'deleteproduct']);
Route::post('update-cart', [App\Http\Controllers\Frontend\CartController::class, 'updatecart']);

Route::post('add-to-wishlist', [App\Http\Controllers\Frontend\WishlistController::class, 'addproduct']);
Route::post('delete-wishlist-item', [App\Http\Controllers\Frontend\WishlistController::class, 'deleteproduct']);

Auth::routes(['verify' => true]);
Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index'])->middleware('verified');

Route::get('trendingcategory', [App\Http\Controllers\Frontend\FrontendController::class, 'trendingcategory']);
Route::get('featurecategory', [App\Http\Controllers\Frontend\FrontendController::class, 'featurecategory']);
Route::get('allcategories', [App\Http\Controllers\Frontend\FrontendController::class, 'allcategories']);
Route::get('/collections/{category_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'products']);
Route::get('/categoryview', [App\Http\Controllers\Frontend\FrontendController::class, 'categoryview']);
Route::get('/productviews', [App\Http\Controllers\Frontend\FrontendController::class, 'productviews']);
Route::get('/collections/{category_slug}/{product_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'productView']);
Route::get('product-list', [App\Http\Controllers\Frontend\Frontend2Controller::class, 'productlistAjax']);
Route::post('searchproduct', [App\Http\Controllers\Frontend\Frontend2Controller::class, 'searchproduct']);
// frontend route ends
// admin route start
Auth::routes();
Route::prefix('admin')->group(function () {
    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('product-image/{product_image_id}/delete', 'destroyImage');
    });
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth', 'isAdmin'])->group(function () {
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('dashboard', [App\Http\Controllers\Admin\FrontendController::class, 'index']);
    Route::get('categories', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
    Route::get('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'add']);
    Route::post('insert-category', [App\Http\Controllers\Admin\CategoryController::class, 'insert']);
    Route::get('edit-prod/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
    Route::put('update-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
    Route::get('delete-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);
    Route::get('products', [App\Http\Controllers\Admin\ProductController::class, 'index']);
    Route::get('add-products', [App\Http\Controllers\Admin\ProductController::class, 'add']);
    Route::post('insert-product', [App\Http\Controllers\Admin\ProductController::class, 'insert']);
    Route::get('edit-product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'edit']);
    Route::put('update-product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update']);
    Route::get('delete-product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'destroy']);
    Route::get('slider', [App\Http\Controllers\Admin\SliderController::class, 'index']);
    Route::get('add-slider', [App\Http\Controllers\Admin\SliderController::class, 'add']);
    Route::post('insert-slider', [App\Http\Controllers\Admin\SliderController::class, 'insert']);
    Route::get('edit-slider/{id}', [App\Http\Controllers\Admin\SliderController::class, 'edit']);
    Route::put('update-slider/{id}', [App\Http\Controllers\Admin\SliderController::class, 'update']);
    Route::get('delete-slider/{id}', [App\Http\Controllers\Admin\SliderController::class, 'destroy']);
    Route::get('users', [App\Http\Controllers\Admin\DashboardController::class, 'users']);
    Route::get('view-user/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'viewuser']);

    Route::get('orders', [App\Http\Controllers\Admin\OrderController::class, 'index']);
    Route::get('admin/view-order/{id}', [App\Http\Controllers\Admin\OrderController::class, 'view']);

    Route::get('invoice-order/{id}', [App\Http\Controllers\Admin\OrderController::class, 'viewinvoice']);
    Route::get('invoice-order/{id}/mail', [App\Http\Controllers\Admin\OrderController::class, 'mailinvoice']);

    Route::put('update-order/{id}', [App\Http\Controllers\Admin\OrderController::class, 'updateorder']);
    Route::get('order-history', [App\Http\Controllers\Admin\OrderController::class, 'orderhistory']);
    Route::get('purchase-order/{id}/mail', [App\Http\Controllers\Admin\OrderController::class, 'purchaseinvoice']);
    Route::get(' currency', [App\Http\Controllers\CurrencyController::class, 'index']);
    Route::get('add-currency', [App\Http\Controllers\CurrencyController::class, 'add']);
    Route::post('insert-currency',[App\Http\Controllers\CurrencyController::class, 'insert']);
    Route::get('edit-currency/{id}',[App\Http\Controllers\CurrencyController::class, 'edit']);
    Route::put('update-currency/{id}',[App\Http\Controllers\CurrencyController::class, 'update']);
    Route::get('delete-currency/{id}',[App\Http\Controllers\CurrencyController::class, 'destroy']);
    Route::post('currency_status',[App\Http\Controllers\CurrencyController::class, 'currencyStatus']);
    Route::post('currency_load',[App\Http\Controllers\CurrencyController::class, 'currencyload'])->name('currency.load');
});
