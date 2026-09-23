<?php

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use App\Providers;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'counts' => [
            'categories' => Category::count(),
            'products' => Product::count(),
            'orders' => Order::count(),
            'reviews' => Review::count(),
            'users' => User::count(),
        ],
    ]);
});

Route::get('/categories', [Providers\category\index::class, 'index'])->name('categories.index');
Route::get('/categories/{category}/edit', [Providers\category\edit::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [Providers\category\update::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [Providers\category\delete::class, 'delete'])->name('categories.delete');

Route::get('/orders', [Providers\order\index::class, 'index'])->name('orders.index');
Route::get('/orders/{order}/edit', [Providers\order\edit::class, 'edit'])->name('orders.edit');
Route::put('/orders/{order}', [Providers\order\update::class, 'update'])->name('orders.update');
Route::delete('/orders/{order}', [Providers\order\delete::class, 'delete'])->name('orders.delete');

Route::get('/order-rows', [Providers\orderrow\index::class, 'index'])->name('order-rows.index');
Route::get('/order-rows/{orderRow}/edit', [Providers\orderrow\edit::class, 'edit'])->name('order-rows.edit');
Route::put('/order-rows/{orderRow}', [Providers\orderrow\update::class, 'update'])->name('order-rows.update');
Route::delete('/order-rows/{orderRow}', [Providers\orderrow\delete::class, 'delete'])->name('order-rows.delete');

Route::get('/prices', [Providers\price\index::class, 'index'])->name('prices.index');
Route::get('/prices/{price}/edit', [Providers\price\edit::class, 'edit'])->name('prices.edit');
Route::put('/prices/{price}', [Providers\price\update::class, 'update'])->name('prices.update');
Route::delete('/prices/{price}', [Providers\price\delete::class, 'delete'])->name('prices.delete');

Route::get('/products', [Providers\product\index::class, 'index'])->name('products.index');
Route::get('/products/{product}/edit', [Providers\product\edit::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [Providers\product\update::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [Providers\product\delete::class, 'delete'])->name('products.delete');

Route::get('/reviews', [Providers\review\index::class, 'index'])->name('reviews.index');
Route::get('/reviews/{review}/edit', [Providers\review\edit::class, 'edit'])->name('reviews.edit');
Route::put('/reviews/{review}', [Providers\review\update::class, 'update'])->name('reviews.update');
Route::delete('/reviews/{review}', [Providers\review\delete::class, 'delete'])->name('reviews.delete');

Route::get('/users', [Providers\user\index::class, 'index'])->name('users.index');
Route::get('/users/{user}/edit', [Providers\user\edit::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [Providers\user\update::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [Providers\user\delete::class, 'delete'])->name('users.delete');
