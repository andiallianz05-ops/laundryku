<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\CategoryManager;
use App\Livewire\Admin\StoreManager;
use App\Livewire\Admin\UserManager;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Seller\StoreRegistration;
use App\Livewire\Seller\Dashboard as SellerDashboard;
use App\Livewire\Seller\ProductManager;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute khusus ADMIN (Kelola Kategori)
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('admin.dashboard');
    Route::get('/categories', CategoryManager::class)->name('admin.categories');
    Route::get('/stores', StoreManager::class)->name('admin.stores');
    Route::get('/users', UserManager::class)->name('admin.users');
});


// Contoh rute sementara untuk Seller yang sudah login
Route::middleware(['auth', 'role:seller'])->prefix('seller')->group(function () {
    Route::get('/register-store', StoreRegistration::class)->name('seller.register-store');
    Route::get('/dashboard', SellerDashboard::class)->name('seller.dashboard');
    Route::get('/products', ProductManager::class)->name('seller.products');

    // Halaman dashboard seller (sementara sederhana dulu)
    Route::get('/dashboard', function () {
        return view('livewire.seller.dashboard-placeholder'); // Atau buat komponen Livewire-nya nanti
    })->name('seller.dashboard');
});


require __DIR__.'/auth.php';
