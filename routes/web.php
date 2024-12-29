<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect()->route('orders.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

    Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');

    // Route for updating the order
    Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');

    // Route for deleting the order
    Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');

});

Route::middleware(['auth'])->get('/orders/upload', [OrderController::class, 'uploadForm'])->name('orders.uploadForm');

// Route to handle the file upload and import
Route::middleware(['auth'])->post('/orders/upload', [OrderController::class, 'upload'])->name('orders.upload');



require __DIR__.'/auth.php';
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');




