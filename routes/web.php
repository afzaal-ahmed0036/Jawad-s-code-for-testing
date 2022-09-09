<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChangePassController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\MyController;
use App\Models\Brand;
use App\Models\About;

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

// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum' , 'verified'])->get('/dashboard' , function()
{
   
   return view('admin.index' );
})->name('dashboard');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});

// Route::get('/dashboard' , function()
// {
//    return view('dashboard');
// })->name('dashboard');

Route::get('/about' , function()
{
    $about = About::first();
   return view('pages.about' , compact('about'));
})->name('about');
Route::get('/test' , function()
{
    dd(\Request::ip());
});

Route::get('/home' , [AboutController::class , 'Home'])->name('main.home');

// route for multiple image   
Route::get('/multiple/image' , [BrandController::class , 'Multipic'])->name('multi.image');
Route::post('/multiple/image/store' , [BrandController::class , 'storeImages'])->name('store.image');
Route::post('/multiple/image/delete/{id}' , [BrandController::class , 'DeleteImage'])->name('delete.image');

// routes for products
Route::get('/admin/product' , [ProductController::class , 'index'])->name('products.index');
Route::get('/admin/product/create' , [ProductController::class , 'createProduct'])->name('create.product');
Route::post('/admin/product/store' , [ProductController::class , 'storeProduct'])->name('store.product');
Route::post('/admin/product/update/{id}' , [ProductController::class , 'updateProduct'])->name('update.product');
Route::get('/admin/product/delete/{id}' , [ProductController::class , 'ProductDelete'])->name('delete.product');
Route::get('/admin/product/edit/{id}' , [ProductController::class , 'ProductEdit'])->name('edit.product');
Route::get('/admin/product/show/{id}' , [ProductController::class , 'Productshow'])->name('show.product');

//route for messages

Route::get('/admin/messages' , [ContactController::class , 'adminMessages'])->name('admin.messages');
Route::get('/admin/message/delete/{id}' , [ContactController::class , 'adminMessageDelete'])->name('delete.messages');
Route::post('/message/store' , [ContactController::class , 'storeMessage'])->name('store.message');
Route::get('/message/show' , [ContactController::class , 'messageHome'])->name('home.message');


// Route::get('/about' , [AboutController::class , 'index']);
Route::get('/admin/contact' , [ContactController::class , 'AdminContact'])->name('admin.contact');
Route::get('/admin/add/contact' , [ContactController::class , 'AdminAddContact'])->name('add.contact');
Route::get('/admin/delete/contact/{id}' , [ContactController::class , 'deleteContact'])->name('delete.contact');
Route::post('/admin/store/contact' , [ContactController::class , 'AdminstoreContact'])->name('store.contact');
Route::get('/admin/edit/contact{id}' , [ContactController::class , 'EditAdminContact'])->name('edit.contact');
Route::get('/admin/update/contact{id}' , [ContactController::class , 'UpdateAdminContact'])->name('update.contact');

// password
Route::get('/user/password' , [ChangePassController::class , 'CPassword'])->name('change.password');
Route::post('/reset/password' , [ChangePassController::class , 'resetPassword'])->name('password.reset');
Route::post('/password/update' , [ChangePassController::class , 'UpdatePassword'])->name('password.update');

//profile

Route::get('/profile' , [ChangePassController::class , 'profileUpdate'])->name('profile.update');
Route::post('/profile/update' , [ChangePassController::class , 'userProfileUpdated'])->name('update.user.profile');
Route::get('/user/profile/' , [ChangePassController::class , 'NormalUserProfile'])->name('Normaluser.profile');
Route::post('/user/profile/update' , [ChangePassController::class , 'NormaluserProfileUpdated'])->name('NormalUser.update');

Route::get('/category/all' , [CategoryController::class , 'AllCat'])->name('all.category');

//routes for brand 
Route::get('/brand/all' , [BrandController::class , 'BrandAll'])->name('all.brand');
Route::get('admin/brand/add' , [BrandController::class , 'AdminAddBrand'])->name('add.brand');
Route::post('admin/brand/store' , [BrandController::class , 'AdminStoreBrand'])->name('store.brand');
Route::get('/admin/brand/edit/{id}' , [BrandController::class , 'AdminBrandEdit'])->name('edit.brand');
Route::get('/admin/brand/delete/{id}' , [BrandController::class , 'AdminBrandDelete'])->name('delete.brand');
Route::post('/admin/brand/update/{id}' , [BrandController::class , 'AdminBrandUpdate'])->name('update.brand');

Route::get('/logout' , [BrandController::class , 'Logout'])->name('logout');

Route::get('/admin/About/add' , [AboutController::class , 'storeAbout'])->name('store.about');
Route::get('/admin/about' , [AboutController::class , 'index'])->name('all.about');
Route::get('/admin/edit/about/{id}' , [AboutController::class , 'AdminEditAbout'])->name('edit.about');
Route::get('/admin/delete/contact/{id}' , [AboutController::class , 'AdmindeleteAbout'])->name('delete.about');
Route::get('/admin/add/about' , [AboutController::class , 'AdminAddabout'])->name('add.about');
Route::get('/admin/update/about/{id}' , [AboutController::class , 'updateAbout'])->name('update.about');

// routes for category
Route::get('/admin/category/' , [CategoryController::class , 'index'])->name('all.category');
Route::post('/admin/category/store' , [CategoryController::class , 'storeCategory'])->name('store.category');
Route::get('/admin/category/edit/{id}' , [CategoryController::class , 'editCategory'])->name('edit.category');
Route::get('/admin/category/delete/{id}' , [CategoryController::class , 'deleteCategory'])->name('delete.category');
Route::post('/admin/category/update/{id}' , [CategoryController::class , 'updateCategory'])->name('update.category');

//routes for slider
Route::get('/slider' , [SliderController::class , 'homeSlider'])->name('home.slider');
Route::get('/slider/create' , [SliderController::class , 'createSlider'])->name('create.slider');
Route::post('/slider/store' , [SliderController::class , 'storeSlider'])->name('store.slider');
Route::get('/slider/edit/{id}' , [SliderController::class , 'editSlider'])->name('edit.slider');
Route::get('/slider/delete{id}' , [SliderController::class , 'deleteSlider'])->name('delete.slider');
Route::post('/slider/update{id}' , [SliderController::class , 'updateSlider'])->name('update.slider');

// route for portfolio

Route::get('/portfolio' , [AboutController::class , 'portfolio'])->name('portfolio');
Route::get('/product' , [ProductController::class , 'allProduct'])->name('product');
Route::get('/product/detail/{id}' , [ProductController::class , 'EachProduct'])->name('ProductDetail');

// route for cart
Route::get('/product/details/{id}' , [CartController::class , 'Product'])->name('cart.product');
Route::post('/Add/cart/{id}' , [CartController::class , 'AddTOCart'])->name('add.cart');
Route::get('/cart/product/shipping/{id}' , [CartController::class , 'shippingAddress'])->name('shipping');
Route::post('/cart/shipping/store/' , [CartController::class , 'storeShipping'])->name('store.shippingAddress');
Route::get('/cart/product' , [CartController::class , 'cartItem'])->name('cart.item');



Route::get('create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
Route::get('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');

// stripe
Route::get('stripe', [StripePaymentController::class, 'stripe']);
Route::post('stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');

// 
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// route for csv
Route::get('importExportView', [MyController::class, 'importExportView'])->name('csv.view');
Route::get('export', [MyController::class, 'export'])->name('export');
Route::post('import', [MyController::class, 'import'])->name('import');