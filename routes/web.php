<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;

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
    Route::resource('proposals', ProposalController::class);
    Route::resource('invoices', InvoiceController::class);
    Route::resource('transactions', TransactionController::class);
    Route::get('invoice/{invoice}/checkout', [PaymentController::class, 'checkout'])->name('invoice.checkout');
    Route::get('invoice/{invoice}/success', [PaymentController::class, 'success'])->name('invoice.success');
});

Route::resource('customers', CustomerController::class)->middleware(['auth']);

require __DIR__ . '/auth.php';
