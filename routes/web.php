<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('frontend.home');
    });  //->name('public.home');

 Route::get('/newblog', function () {
    return view('frontend.newblog');
    });  //->name('public.newblog');

 Route::get('/blog-details', function () {
    return view('frontend.blog-details');
    });  //->name('public.newblog');

     Route::get('/portfolio-details', function () {
    return view('frontend.portfolio-details');
    });  //->name('public.newblog');


 
Route::get('/dashboard',[DashboardController::class,  'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::match(['put', 'patch'], '/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
