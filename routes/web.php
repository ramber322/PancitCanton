<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CtchipsController;
use App\Http\Controllers\UserxController;
use App\Http\Controllers\OrderLineController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('logout', function () {
    return view('login');
});




    Route::get('/info', function () {
        return view('info'); })->middleware(['auth', 'verified'])->name('info');



route::get('admin/dashboard',[HomeController::class, 'index'])->middleware(['auth','admin']);


Route::middleware('auth','admin')->group(function () { 

    Route::get('/dashboard', function () {
        return view('dashboard'); })->middleware(['auth', 'verified'])->name('dashboard');

});




Route::middleware('auth','admin')->group(function () {


    route::get('admin/dashboard',[DashboardController::class, 'showFoods']);
    route::get('admin/ctchips',[DashboardController::class, 'showChips']);
    route::get('admin/ctdrinks',[DashboardController::class, 'showDrinks']);


    Route::post('admin/ctchips', [OrderLineController::class, 'deleteOrderline'])->name('deleteOrderline');


    Route::post('admin/dashboard/addToCart', [OrderLineController::class, 'addToCart'])->name('dashboard.addToCart');

    Route::post('admin/ctchips/addToCart', [OrderLineController::class, 'addToCart'])->name('ctchips.addToCart');
    Route::post('admin/ctdrinks/addToCart', [OrderLineController::class, 'addToCart'])->name('ctdrinks.addToCart');
    Route::post('admin/ctchips/deleteAllRows', [OrderLineController::class, 'deleteAllRows'])->name('ctchips.deleteAllRows');

    route::get('admin/products', [ProductController::class, 'index']);
    route::post('admin/products', [ProductController::class, 'store'])->name('products.store');

    Route::get('admin/products/delete/{Product_ID}', [ProductController::class, 'remove']);


    route::get('admin/users', [UserxController::class, 'displayUsers']);
    route::post('admin/users',[UserxController::class, 'createUser'])->name('users.createUser');


    Route::post('admin/ctchips/validateStudent', [UserxController::class, 'validateStudent'])->name('ctchips.validateStudent');

    Route::get('admin/ctchips/minus/{id}', [DashboardController::class, 'minusQuantity']);
    Route::get('admin/ctchips/add/{id}', [DashboardController::class, 'addQuantity']);
    Route::get('admin/ctchips/delete/{id}', [DashboardController::class, 'removeItem']);


    Route::put('admin/users/{id}', [UserxController::class, 'addBalance']);

    ///////////////

    Route::post('admin/users/update-balance', [UserxController::class, 'updateBalance'])->name('users.updateBalance');
   // Route::post('/admin/users/add-balance', [UserxController::class, 'addBalance'])->name('users.add-balance');
    Route::post('admin/ctchips/purchase', [UserxController::class, 'purchase'])->name('ctchips.purchase');
});










    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

require __DIR__.'/auth.php';