<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\CustomerProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/products', [ProductController::class, 'index'])->name('home');
// Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
// Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products', [ProductController::class, 'index'])->name('admin.product');
Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');


// Route::resource('productdelete' , ProductController::class);

Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');


Route::get('/', function () {
    return view('index');
});


Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/About', function () {
    return view('About');
});


// Route::get('/single-product/{id}', function () {
//     return view('single-product');
// });
// Route::get('/product/{id}', 'ProductController@show')->name('product.show');

Route::get('/Admin', [AdminController::class, 'index'])->name('admin.dashboard');





Route::get('/product/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('showproduct');
Route::get('/card/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('card');



Route::get('/projet', function () {
    return view('index');
});


Route::get('/product', function () {
    $result = DB::table('products')->get();
    return view('product' , ['products'=>$result]);
});

Route::get('/category', function () {
    $result = DB::table('categories')->get();
    return view('category', ['categories'=> $result]);
});


Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

// Route::get('/category/{id}', [CategoryController::class ,'showProducts'])->name('categories.products');

// routes/web.php

Route::get('/checkout',[CustomerController::class, 'showForm'])->name('checkout.form');
// Route::post('/checkout', [CustomerController::class,'store'])->name('checkout.store');

// Route::get('/checkoutOrde', [ProductController::class,'checkoutOrde']);
Route::post('checkoutOrder', [ProductController::class, 'checkoutOrder'])->name('checkoutOrder');





// Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
// Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

// Route::post('/productsc', [ProductController::class, 'store'])->name('products.store');

// Route::resource('products', ProductController::class);
// Route::post('/products', [ProductController::class, 'store'])->name('products.store');


// Route::get('/addproduct', [ProductController::class, 'showAddForm'])->name('product.create');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
