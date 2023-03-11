<?php

use App\Http\Controllers\{AboutController,
    CartController,
    CategoryController,
    ContactController,
    MaterialController,
    PrivacyController,
    ProductController,
    SafetyResistanceController,
    ProfileController,
    SizeController,
    SocialLinksController,
    StyleController,
    SubCategoryController,
    TermController,
    TierLevelController,
    UserController};
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
})->name('welcome-home');

Route::get('/test', function(){
    return view('test');
})->name('test');

Route::get('/display-all-products', [ProductController::class, 'displayAllProduct']);
Route::get('/display-men-products', [ProductController::class, 'displayMenProduct']);
Route::get('/display-women-products', [ProductController::class, 'displayWomenProduct']);

Route::get('/display-products', [ProductController::class, 'displayProducts']);

Route::get('/product-detail/{slug}', [ProductController::class, 'detail']);
Route::post('/addToCart', [ProductController::class, 'addInCart']);

Route::get('/cart-login', function () {
    return Inertia::render('Auth/Register');
})->name('cart-login');

Route::get('/show-products/all', function () {
    return Inertia::render('User/Products');
})->name('show_products_all');
Route::get('/show-products/men', function () {
    return Inertia::render('User/Products');
})->name('show_products_men');
Route::get('/show-products/women', function () {
    return Inertia::render('User/Products');
})->name('show_products_women');

Route::get('/privacy', [PrivacyController::class, 'index'])->name('privacy');
Route::get('/terms', [TermController::class, 'index'])->name('terms');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/about', [AboutController::class, 'index'])->name('about');

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::middleware('role:1')->group(function () {
        //Admin
        Route::get('/dashboard', function () {
            return Inertia::render('Dashboard');
        })->name('dashboard');

        Route::get('/social-links', function () {
            return Inertia::render('Admin/ThemeContent/SocialLinks');
        })->name('social-links');
        Route::get('/privacy-content', function () {
            return Inertia::render('Admin/ThemeContent/Privacy');
        })->name('privacy-content');
        Route::get('/about-content', function () {
            return Inertia::render('Admin/ThemeContent/About');
        })->name('about-content');
        Route::get('/contact-content', function () {
            return Inertia::render('Admin/ThemeContent/Contact');
        })->name('contact-content');
        Route::get('/terms-content', function () {
            return Inertia::render('Admin/ThemeContent/Terms');
        })->name('terms-content');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

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

        Route::get('/save-social', [SocialLinksController::class, 'show']);
        Route::post('/save-social', [SocialLinksController::class, 'store']);

        Route::get('/save-about', [AboutController::class, 'show']);
        Route::post('/save-about', [AboutController::class, 'store']);

        Route::get('/save-privacy', [PrivacyController::class, 'show']);
        Route::post('/save-privacy', [PrivacyController::class, 'store']);

        Route::get('/save-contact', [ContactController::class, 'show']);
        Route::post('/save-contact', [ContactController::class, 'store']);

        Route::get('/save-terms', [TermController::class, 'show']);
        Route::post('/save-terms', [TermController::class, 'store']);

    });

//    user
    Route::get('/cart', function () {
        return Inertia::render('User/Cart');
    })->name('cart');
    Route::get('/cart-items', [CartController::class, 'show']);
    Route::delete('/cart/{id}', [CartController::class, 'destroy']);

    Route::middleware('role:2')->group(function () {
//        Route::get('/cart', function () {
//            return Inertia::render('User/Cart');
//        })->name('cart');
    });
});
