<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DahsboardController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\DeliveriesController;
use App\Http\Controllers\DiscountCategoriesController;
use App\Http\Controllers\DiscountsController;
use App\Http\Controllers\OrderDetailsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductViewController;
use App\Http\Controllers\ProductReviewsController;
use App\Http\Controllers\ProductCategoriesController;
use App\Http\Controllers\WishlistsController;
use App\Http\Controllers\FormCustomerController;
use App\Http\Controllers\FormOrderController;
use App\Http\Controllers\FormPaymentController;
use App\Http\Controllers\FormWishlistController;
use App\Http\Controllers\WishlistslpController;
use App\Http\Controllers\Auth\CustomerLoginController;
use App\Http\Controllers\Auth\CustomerRegisterController;
use App\Http\Controllers\SingleProductController;
use App\Http\Controllers\CartController;

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

Route::get('/', function () {
    return view('homecessa');
});

// code cart
    // Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::get('/hapuscart/{id}', [CartController::class, 'hapuscart'])->name('hapuscart');
    Route::post('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('cart.addToCart');
    Route::resource ('productview', App\Http\Controllers\ProductViewController::class);

/// Route untuk menambahkan produk ke wishlist
Route::post('/add-to-wishlist', [WishlistslpController::class, 'addToWishlist'])->name('add-to-wishlist');
Route::resource ('wishlistslp', App\Http\Controllers\WishlistslpController::class); 
Route::get('/wishlistslp', [WishlistslpController::class, 'index'])->name('wishlistslp.index');

Route::resource ('productview', App\Http\Controllers\ProductViewController::class);

Route::resource ('formcustomer', App\Http\Controllers\FormCustomerController::class);
Route::post('/insertformcust', [FormCustomerController::class, 'insertformcust'])->name('insertformcust');

Route::resource ('formorder', App\Http\Controllers\FormOrderController::class);
Route::post('/insertformorder', [FormOrderController::class, 'insertformorder'])->name('insertformorder');

Route::resource ('formpayment', App\Http\Controllers\FormPaymentController::class);
Route::post('/insertformpayment', [FormPaymentController::class, 'insertformpayment'])->name('insertformpayment');

Route::resource ('formwishlist', App\Http\Controllers\FormWishlistController::class);
Route::post('/insertformwishlist', [FormWishlistController::class, 'insertformwishlist'])->name('insertformwishlist');

Route::group(['middleware' => 'auth'], function () {
    Route::resource ('/dashboard', App\Http\Controllers\DahsboardController::class); 
    Route::get('/dashboard', [DahsboardController::class, 'index'])->name('dashboard');
});

Route::resource('login', App\Http\Controllers\LoginController::class);
Route::resource('register', App\Http\Controllers\RegisterController::class);

Route::resource('users', \App\Http\Controllers\UsersController::class);
Route::post('/insertdata', [UsersController::class, 'insertdata'])->name('insertdata');
Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [UsersController::class, 'update'])->name('update');
Route::get('/hapususers/{id}', [UsersController::class, 'hapususers'])->name('hapususers');
Route::get('/users/hapususers/{id}', [UsersController::class, 'hapususers']);

Route::resource('customers', \App\Http\Controllers\CustomersController::class);
Route::post('/insertcustomers', [CustomersController::class, 'insertcustomers'])->name('insertcustomers');
Route::get('/edit/{id}', [CustomersController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [CustomersController::class, 'update'])->name('update');
Route::get('/hapuscustomers/{id}', [CustomersController::class, 'hapuscustomers'])->name('hapuscustomers');
Route::get('/customers/hapuscustomers/{id}', [CustomersController::class, 'hapuscustomers']);

Route::resource('deliveries', \App\Http\Controllers\DeliveriesController::class);
Route::post('/insertdeliveries', [DeliveriesController::class, 'insertdeliveries'])->name('insertdeliveries');
Route::get('/edit/{id}', [DeliveriesController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [DeliveriesController::class, 'update'])->name('update');
Route::get('/hapusdeliveries/{id}', [DeliveriesController::class, 'hapusdeliveries'])->name('hapusdeliveries');
Route::get('/deliveries/hapusdeliveries/{id}', [DeliveriesController::class, 'hapusdeliveries']);

Route::resource('discountcategories', \App\Http\Controllers\DiscountCategoriesController::class);
Route::post('/insertdisccat', [DiscountCategoriesController::class, 'insertdisccat'])->name('insertdisccat');
Route::get('/edit/{id}', [DiscountCategoriesController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [DiscountCategoriesController::class, 'update'])->name('update');
Route::get('/hapusdiscountcategories/{id}', [DiscountCategoriesController::class, 'hapusdiscountcategories'])->name('hapusdiscountcategories');
Route::get('/discountcategories/hapusdiscountcategories/{id}', [DiscountCategoriesController::class, 'hapusdiscountcategories']);

Route::resource('discounts', App\Http\Controllers\DiscountsController::class);
Route::post('/insertdiscounts', [DiscountsController::class, 'insertdiscounts'])->name('insertdiscounts');
Route::get('/edit/{id}', [DiscountsController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [DiscountsController::class, 'update'])->name('update');
Route::get('/hapusdiscounts/{id}', [DiscountsController::class, 'hapusdiscounts'])->name('hapusdiscounts');
Route::get('/discounts/hapusdiscounts/{id}', [DiscountsController::class, 'hapusdiscounts']);

Route::resource('orders', App\Http\Controllers\OrdersController::class);
Route::post('/insertorders', [OrdersController::class, 'insertorders'])->name('insertorders');
Route::get('/edit/{id}', [OrdersController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [OrdersController::class, 'update'])->name('update');
Route::get('/hapusorders/{id}', [OrdersController::class, 'hapusorders'])->name('hapusorders');
Route::get('/orders/hapusorders/{id}', [OrdersController::class, 'hapusorders']);

Route::resource('orderdetails', \App\Http\Controllers\OrderDetailsController::class);
Route::post('/insertorderdetails', [OrderDetailsController::class, 'insertorderdetails'])->name('insertorderdetails');
Route::get('/edit/{id}', [OrderDetailsController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [OrderDetailsController::class, 'update'])->name('update');
Route::get('/hapusorderdetails/{id}', [OrderDetailsController::class, 'hapusorderdetails'])->name('hapusorderdetails');
Route::get('/orderdetails/hapusorderdetails/{id}', [OrderDetailsController::class, 'hapusorderdetails']);

Route::resource('productcategories', App\Http\Controllers\ProductCategoriesController::class);
Route::post('/insertprocat', [ProductCategoriesController::class, 'insertprocat'])->name('insertprocat');
Route::get('/edit/{id}', [ProductCategoriesController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [ProductCategoriesController::class, 'update'])->name('update');
Route::get('/hapusproductcategories/{id}', [ProductCategoriesController::class, 'hapusproductcategories'])->name('hapusproductcategories');
Route::get('/productcategories/hapusproductcategories/{id}', [ProductCategoriesController::class, 'hapusproductcategories']);

Route::resource('payments', App\Http\Controllers\PaymentsController::class);
Route::post('/insertpayments', [PaymentsController::class, 'insertpayments'])->name('insertpayments');
Route::get('/edit/{id}', [PaymentsController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [PaymentsController::class, 'update'])->name('update');
Route::get('/hapuspayments/{id}', [PaymentsController::class, 'hapuspayments'])->name('hapuspayments');
Route::get('/payments/hapuspayments/{id}', [PaymentsController::class, 'hapuspayments']);

Route::resource('productreviews', App\Http\Controllers\ProductReviewsController::class);
Route::post('/insertproductreviews', [ProductReviewsController::class, 'insertproductreviews'])->name('insertproductreviews');
Route::get('/edit/{id}', [ProductReviewsController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [ProductReviewsController::class, 'update'])->name('update');
Route::get('/hapusproductreviews/{id}', [ProductReviewsController::class, 'hapusproductreviews'])->name('hapusproductreviews');
Route::get('/productreviews/hapusproductreviews/{id}', [ProductReviewsController::class, 'hapusproductreviews']);

Route::resource('products', App\Http\Controllers\ProductsController::class);
Route::post('/store', [ProductsController::class, 'store'])->name('store');
Route::get('/edit/{id}', [ProductsController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [ProductsController::class, 'update'])->name('update');
Route::get('/hapusproducts/{id}', [ProductsController::class, 'hapusproducts'])->name('hapusproducts');
Route::get('/products/hapusproducts/{id}', [ProductsController::class, 'hapusproducts']);

Route::resource('wishlists', App\Http\Controllers\WishlistsController::class);
Route::post('/insertwishlists', [WishlistsController::class, 'insertwishlists'])->name('insertwishlists');
Route::get('/edit/{id}', [WishlistsController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [WishlistsController::class, 'update'])->name('update');
Route::get('/hapuswishlists/{id}', [WishlistsController::class, 'hapuswishlists'])->name('hapuswishlists');
Route::get('/wishlists/hapuswishlists/{id}', [WishlistsController::class, 'hapuswishlists']);


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route register customer
Route::get('/customer/register', [CustomerRegisterController::class, 'showRegistrationForm'])->name('register.register');
Route::post('/customer/register', [CustomerRegisterController::class, 'register'])->name('register.register.post');

// Route login customer
Route::get('/customer/login', [CustomerLoginController::class, 'showLoginForm'])->name('login.login');
Route::post('/customer/login', [CustomerLoginController::class, 'login'])->name('login.login.post');

//Logout 
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/singleproduct/{id}', [SingleproductController::class, 'show'])->name('singleproduct.show');
