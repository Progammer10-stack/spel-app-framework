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
Route::get('/examples', [Providers\example\index::class, 'index'])->name('examples.index');
Route::get('/orders', [Providers\order\index::class, 'index'])->name('orders.index');
Route::get('/order-rows', [Providers\orderrow\index::class, 'index'])->name('order-rows.index');
Route::get('/prices', [Providers\price\index::class, 'index'])->name('prices.index');
Route::get('/products', [Providers\product\index::class, 'index'])->name('products.index');
Route::get('/reviews', [Providers\review\index::class, 'index'])->name('reviews.index');
Route::get('/users', [Providers\user\index::class, 'index'])->name('users.index');
