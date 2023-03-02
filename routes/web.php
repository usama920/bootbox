<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SafetyResistanceController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\StyleController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TierLevelController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Material;
use App\Models\Size;
use App\Models\Style;
use App\Models\SubCategory;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::get('/test', function(){
    return view('test');
})->name('test');
//Route::get('/dashboard', function () {
//    return Inertia::render('Dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    //Admin

    Route::middleware('role:1')->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

//    Route::get('/category', fn ()=> Inertia::render('ProductDetail/Category') )->name('personal');

        Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/category/{id}', [CategoryController::class, 'show']);
        Route::post('/category', [CategoryController::class, 'store']);
        Route::delete('/category/{id}', [CategoryController::class, 'destroy']);

        Route::get('/sub-category', [SubCategoryController::class, 'index'])->name('sub_category.index');
        Route::get('/sub-category/{id}', [SubCategoryController::class, 'show']);
        Route::post('/sub-category', [SubCategoryController::class, 'store']);
        Route::delete('/sub-category/{id}', [SubCategoryController::class, 'destroy']);

        Route::get('/material', [MaterialController::class, 'index'])->name('material.index');
        Route::get('/material/{id}', [MaterialController::class, 'show']);
        Route::post('/material', [MaterialController::class, 'store']);
        Route::delete('/material/{id}', [MaterialController::class, 'destroy']);

        Route::get('/size', [SizeController::class, 'index'])->name('size.index');
        Route::get('/size/{id}', [SizeController::class, 'show']);
        Route::post('/size', [SizeController::class, 'store']);
        Route::delete('/size/{id}', [SizeController::class, 'destroy']);

        Route::get('/style', [StyleController::class, 'index'])->name('style.index');
        Route::get('/style/{id}', [StyleController::class, 'show']);
        Route::post('/style', [StyleController::class, 'store']);
        Route::delete('/style/{id}', [StyleController::class, 'destroy']);

        Route::get('/tier', [TierLevelController::class, 'index'])->name('tier_level.index');
        Route::get('/tier/{id}', [TierLevelController::class, 'show']);
        Route::post('/tier', [TierLevelController::class, 'store']);
        Route::delete('/tier/{id}', [TierLevelController::class, 'destroy']);

        Route::get('/safety-resistance', [SafetyResistanceController::class, 'index'])->name('safety_resistance.index');
        Route::get('/safety-resistance/{id}', [SafetyResistanceController::class, 'show']);
        Route::post('/safety-resistance', [SafetyResistanceController::class, 'store']);
        Route::delete('/safety-resistance/{id}', [SafetyResistanceController::class, 'destroy']);

        Route::get('/product-options', [ProductController::class, 'options']);
        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        Route::get('/products/edit/{slug?}', [ProductController::class, 'show'])->name('products.show');
        Route::post('/save-product', [ProductController::class, 'store']);
        Route::delete('/delete-product/{id}', [ProductController::class, 'destroy']);

        Route::get('users', [UserController::class, 'index'])->name('users.index');
        Route::delete('/users/{id}', [UserController::class, 'destroy']);

        Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
        Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    });

    //    User
    Route::middleware('role:2')->group(function () {

    });
});
