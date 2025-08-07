<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::post('/products/{product}/purchase', [ProductController::class, 'purchase'])->name('products.purchase');

Route::get('/purchase/{product_id}', [PurchaseController::class, 'show'])->name('purchase.show');

Route::post('/purchase', [PurchaseController::class, 'store'])->name('purchase.store');

Route::middleware(['auth'])->group(function () {

    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

    Route::post('/products/{id}/like', [LikeController::class, 'toggleLike'])->name('products.like');

    Route::post('/products', [ProductController::class, 'store'])->name('products.store');

    Route::get('/sell', function () {
        return view('sell');
    })->name('sell');

    Route::get('/mypage', [UserController::class, 'index'])->name('mypage');

    Route::get('/mypage/purchases', [ProfileController::class, 'purchases'])->name('purchases');

    Route::post('/products/{product}/like', [LikeController::class, 'toggle'])->name('products.like');
});

Route::get('/products/recommended', [ProductController::class, 'recommended'])->name('products.recommended');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('/address/edit', [ProfileController::class, 'editAddress'])->name('address.edit');
Route::post('/address/update', [ProfileController::class, 'updateAddress'])->name('address.update');

Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.show');

Route::get('/search', [ProductController::class, 'search'])->name('search');
