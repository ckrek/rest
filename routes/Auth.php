<?php
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']); // <- store, а не login
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');