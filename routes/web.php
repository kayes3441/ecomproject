<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PreOrderProductController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\CustomerDashBoardController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\SearchController;
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

//for Front-End (User )
//Home Page
Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/product-all', [HomeController::class,'allProduct'])->name('all-product');
Route::get('/product-category/{id}', [HomeController::class,'categoryProduct'])->name('category-product');
Route::get('/product-sub-category/{id}', [HomeController::class,'subCategoryProduct'])->name('sub-category-product');
Route::get('/product-detail/{id}', [HomeController::class,'detailProduct'])->name('detail-product');
//Cart Controller
Route::post('/product-cart-add/{id}', [CartController::class,'cartProductAdd'])->name('cart-product-add');
Route::get('/product-cart-show', [CartController::class,'cartProductShow'])->name('cart-product-show')->middleware('customerCart');
Route::post('/product-cart-update/{id}', [CartController::class,'cartProductUpdate'])->name('cart-product-update');
Route::post('/product-cart-remove/{id}', [CartController::class,'cartProductRemove'])->name('cart-product-remove');
Route::get('/product-view-cart-remove/{id}', [CartController::class,'viewCartProductRemove'])->name('cart-product-view-remove');

//CheckOutController
Route::get('/product-checkout', [CheckOutController::class,'checkoutProduct'])->name('checkout-product')->middleware('customerCheckout');
Route::post('/new-order', [CheckOutController::class,'newOrder'])->name('new-order');

//CustomerOrderController
Route::get('/customer-order-complete', [CustomerOrderController::class,'customerOrder'])->name('customer-order-complete')->middleware('customerOrderComplete');
//CustomerDashBoardController
Route::get('/customer-dashboard', [CustomerDashBoardController::class,'customerDashBoard'])->name('customer-dashboard')->middleware('customer');

//CustomerAuthController
//Route::get('/customer-login-page', [CustomerAuthController::class,'customerLoginPage'])->name('customer-login-page');
Route::post('/customer-login', [CustomerAuthController::class,'login'])->name('customer-login');
Route::get('/customer-register', [CustomerAuthController::class,'register'])->name('customer-register')->middleware('customerLogout');
Route::post('/customer-new', [CustomerAuthController::class,'newCustomer'])->name('customer-new');
Route::get('/customer-logout', [CustomerAuthController::class,'logout'])->name('customer-logout');

//search-product
//Route::get('/search-product-page', [SearchController::class,'searchProductPage'])->name('search-product-page');
//Route::post('/search-product', [SearchController::class,'searchProduct']);

//for Back-End(admin)
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function ()
{
    //Dashboard
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    //Category Route
    Route::get('/add-category',[CategoryController::class,'add'])->name('add.category');
    Route::post('/new-category',[CategoryController::class,'create'])->name('new.category');
    Route::get('/manage-category',[CategoryController::class,'manage'])->name('manage.category');
    Route::get('/edit-category/{id}',[CategoryController::class,'edit'])->name('edit.category');
    Route::post('/update-category/{id}',[CategoryController::class,'update'])->name('update.category');
    Route::get('/delete-category/{id}',[CategoryController::class,'delete'])->name('delete.category');

    //SubCategory Route
    Route::get('/add-sub-category',[SubCategoryController::class,'add'])->name('add.sub-category');
    Route::post('/new-sub-category',[SubCategoryController::class,'create'])->name('new.sub-category');
    Route::get('/manage-sub-category',[SubCategoryController::class,'manage'])->name('manage.sub-category');
    Route::get('/edit-sub-category/{id}',[SubCategoryController::class,'edit'])->name('edit.sub-category');
    Route::post('/update-sub-category/{id}',[SubCategoryController::class,'update'])->name('update.sub-category');
    Route::post('/delete-sub-category/{id}',[SubCategoryController::class,'delete'])->name('delete.sub-category');

    //Brand Route
    Route::get('/add-brand',[BrandController::class,'add'])->name('add.brand');
    Route::post('/new-brand',[BrandController::class,'create'])->name('new.brand');
    Route::get('/manage-brand',[BrandController::class,'manage'])->name('manage.brand');
    Route::get('/edit-brand/{id}',[BrandController::class,'edit'])->name('edit.brand');
    Route::post('/update-brand/{id}',[BrandController::class,'update'])->name('update.brand');
    Route::post('/delete-brand/{id}',[BrandController::class,'delete'])->name('delete.brand');

    //Unit Route
    Route::get('/add-unit',[UnitController::class,'add'])->name('add.unit');
    Route::post('/new-unit',[UnitController::class,'create'])->name('new.unit');
    Route::get('/manage-unit',[UnitController::class,'manage'])->name('manage.unit');
    Route::get('/edit-unit/{id}',[UnitController::class,'edit'])->name('edit.unit');
    Route::post('/update-unit/{id}',[UnitController::class,'update'])->name('update.unit');
    Route::post('/delete-unit{id}',[UnitController::class,'delete'])->name('delete.unit');


    //Product Route
    Route::get('/add-product',[ProductController::class,'add'])->name('add.product');
    Route::get('/get-sub-category-by-category-id',[ProductController::class,'getSubCategory'])->name('product.sub-category');
    Route::post('/new-product',[ProductController::class,'create'])->name('new.product');
    Route::get('/manage-product',[ProductController::class,'manage'])->name('manage.product');
    Route::get('/detail-product/{id}',[ProductController::class,'detail'])->name('detail.product');
    Route::get('/edit-product/{id}',[ProductController::class,'edit'])->name('edit.product');
    Route::post('/update-product/{id}',[ProductController::class,'update'])->name('update.product');
    Route::post('/delete-product/{id}',[ProductController::class,'delete'])->name('delete.product');


    //Pre_order Route:
    Route::get('/add-pre-order',[PreOrderProductController::class,'add'])->name('add.pre-order');
    Route::get('/manage-pre-order',[PreOrderProductController::class,'manage'])->name('manage.pre-order');


    //Order Module :
    Route::get('/admin-manage-order',[AdminOrderController::class,'manage'])->name('admin.manage.order');

    //Manage User :( Register Customer Table  )
    Route::get('/manage-user',[UserController::class,'manage'])->name('manage.user');

    //Manage Settings
    Route::get('/manage-setting',[SettingController::class,'manage'])->name('manage.setting');

});
