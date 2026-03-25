<?php
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
Route::get('/', [MenuController::class, 'index']);
Route::get('/menu/{category?}', [MenuController::class, 'index'])->name('menu');
Route::get('/product/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('product.show');

Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ProductController;

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // CRUD для Products
    Route::resource('products', ProductController::class);
});