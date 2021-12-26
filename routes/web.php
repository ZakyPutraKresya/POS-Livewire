<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Kasir\KasirController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\Product\CategoryController;
use App\Http\Controllers\Admin\Product\StockController;
use App\Http\Livewire\Cart;

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


Auth::routes([
    'register' => false,
]);
Route::group(['middleware' => 'guest'], function(){
    
    Route::get('/', function () {
        return view('home');
    });
    
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', function () {
        return redirect()->route('home');
    });

    Route::get('/home/search', [HomeController::class, 'search'])->name('search');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Checkrole Admin
    Route::middleware(['checkRole:admin'])->group(function () {
        // Jika sudah login ingin kembali ke halaman login dan regis
        // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

        
        // Product Resource
        Route::resource('admin/product', ProductController::class);
        Route::resource('/product/category', CategoryController::class);
        Route::get('/product/stock', [ProductController::class, 'stock'])->name('product.stock');
        // Route::get('admin/product/truncate', [ProductController::class, 'truncate'])->name('product.truncate');
       
    });

    Route::middleware(['checkRole:kasir'])->group(function () {
        // Jika sudah login ingin kembali ke halaman login dan regis
        Route::resource('kasir', KasirController::class)->only(['index']);
        Route::get('/cart', Cart::class);
        Route::get('/cart/tambah/{id}', [Cart::class, 'tambah_cart'])->name('tambah.cart');
        Route::get('/kasir/diskon', [KasirController::class, 'tambah_diskon'])->name('tambah.diskon');
        Route::patch('/kasir/edit/', [KasirController::class, 'edit_cart'])->name('edit.cart');
        Route::delete('/kasir/hapus', [KasirController::class, 'remove'])->name('remove.from.cart');

        // Route::patch('/kasir/updatePlus', [KasirController::class, 'updatePlus'])->name('update.plus.cart');
        // Route::patch('/kasir/updateMinus', [KasirController::class, 'updateMinus'])->name('update.minus.cart');

        // Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

        
        // // Product Resource
        // Route::resource('admin/product', ProductController::class);
        // Route::resource('admin/category', CategoryController::class);
        // Route::get('admin/stock', [ProductController::class, 'stock'])->name('product.stock');
        // Route::get('admin/product/truncate', [ProductController::class, 'truncate'])->name('product.truncate');
       
    });
        
    
    
    


    // Kasir

});
