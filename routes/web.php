<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ContactController;

// Authentication Routes
Route::middleware(['throttle:login'])->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
    
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});

// Categories Route
Route::get('/categories', [HomeController::class, 'show_categories'])->name('categories');

// Admin Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.home');
    Route::get('/view_catagory', [AdminController::class, 'view_catagory'])->name('admin.categories.index');
    Route::post('/add_catagory', [AdminController::class, 'add_catagory'])->name('admin.categories.store');
    Route::get('/delete_catagory/{id}', [AdminController::class, 'delete_catagory'])->name('admin.categories.destroy');
    Route::get('/view_product', [AdminController::class, 'view_product'])->name('admin.products.create');
    Route::post('/add_product', [AdminController::class, 'add_product'])->name('admin.products.store');
    Route::get('/show_product', [AdminController::class, 'show_product'])->name('admin.products.index');
    Route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);
    Route::get('/update_product/{id}', [AdminController::class, 'update_product']);
    Route::post('/update_product_confirm/{id}', [AdminController::class, 'update_product_confirm']);

    Route::get('/order', [AdminController::class, 'order']);
    Route::get('/delivered/{id}', [AdminController::class, 'delivered']);
    Route::get('/print_pdf/{id}', [AdminController::class, 'print_pdf']);

    Route::get('/search', [AdminController::class, 'searchdata']);
    Route::get('/edit_catagory/{id}', [AdminController::class, 'edit_catagory']);
    Route::post('/update_catagory/{id}', [AdminController::class, 'update_catagory']);
    Route::get('/search_product', [AdminController::class, 'search_product'])->name('admin.products.search');
});

// Home Routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/products/page/{page}', [HomeController::class, 'index'])->name('products.page');
Route::get('/product_details/{id}', [HomeController::class, 'product_details']);
Route::get('/all_products', [HomeCOntroller::class, 'all_products'])->name('products.all');
Route::get('/categories', [HomeController::class, 'show_categories'])->name('categories');
Route::get('/category_products/{id}', [HomeController::class, 'category_products'])->name('category.products');
Route::get('/search_product', [HomeController::class, 'search_product'])->name('search_product');
Route::post('/add_cart/{id}', [HomeController::class, 'add_cart']);
Route::get('/show_cart', [HomeController::class, 'show_cart']);
Route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart']);
Route::get('/cash_order', [HomeController::class, 'cash_order']);

// PDF Routes
Route::get('/download-pdf', [PdfController::class, 'downloadPdf']);
Route::get('/test-view', function () {
    return view('pdf.example', [
        'title' => 'Dynamic Laravel PDF Example',
        'content' => 'This content should be dynamically generated!'
    ]);
});

Route::get('/show_order', [HomeController::class, 'show_order']);
Route::get('/cancel_order/{id}', [HomeController::class, 'cancel_order']);

// Contact Routes
Route::get('/contact', function () {
    return view('home.contact');
})->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Autocomplete predictive search route
Route::get('/autocomplete', [\App\Http\Controllers\AutocompleteController::class, 'products'])->name('autocomplete');


