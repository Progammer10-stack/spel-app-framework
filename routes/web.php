<?php

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use App\Providers;
use Illuminate\Support\Facades\Route;

// Gast: iemand die nog niet is ingelogd. Alleen deze pagina's mag die zien.
Route::middleware('guest')->group(function () {
    // Formulier tonen.
    Route::get('/login', [Providers\auth\login::class, 'login'])->name('login');

    // Formulier verwerken. throttle = maximaal 5 pogingen per minuut.
    Route::post('/login', [Providers\auth\authenticate::class, 'authenticate'])
        ->middleware('throttle:5,1')
        ->name('login.store');
});

// auth = je moet ingelogd zijn. admin = je rol moet Admin zijn.
Route::middleware(['auth', 'admin'])->group(function () {
    // Home: tel hoeveel rijen elke tabel heeft.
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
    })->name('home');

    // Categories
    Route::get('/categories', [Providers\category\index::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [Providers\category\create::class, 'create'])->name('categories.create');
    Route::post('/categories', [Providers\category\store::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [Providers\category\edit::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [Providers\category\update::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [Providers\category\delete::class, 'delete'])->name('categories.delete');

    // Orders
    Route::get('/orders', [Providers\order\index::class, 'index'])->name('orders.index');
    Route::get('/orders/create', [Providers\order\create::class, 'create'])->name('orders.create');
    Route::post('/orders', [Providers\order\store::class, 'store'])->name('orders.store');
    Route::get('/orders/{order}/edit', [Providers\order\edit::class, 'edit'])->name('orders.edit');
    Route::put('/orders/{order}', [Providers\order\update::class, 'update'])->name('orders.update');
    Route::delete('/orders/{order}', [Providers\order\delete::class, 'delete'])->name('orders.delete');

    // Order rows
    Route::get('/order-rows', [Providers\orderrow\index::class, 'index'])->name('order-rows.index');
    Route::get('/order-rows/create', [Providers\orderrow\create::class, 'create'])->name('order-rows.create');
    Route::post('/order-rows', [Providers\orderrow\store::class, 'store'])->name('order-rows.store');
    Route::get('/order-rows/{orderRow}/edit', [Providers\orderrow\edit::class, 'edit'])->name('order-rows.edit');
    Route::put('/order-rows/{orderRow}', [Providers\orderrow\update::class, 'update'])->name('order-rows.update');
    Route::delete('/order-rows/{orderRow}', [Providers\orderrow\delete::class, 'delete'])->name('order-rows.delete');

    // Prices
    Route::get('/prices', [Providers\price\index::class, 'index'])->name('prices.index');
    Route::get('/prices/create', [Providers\price\create::class, 'create'])->name('prices.create');
    Route::post('/prices', [Providers\price\store::class, 'store'])->name('prices.store');
    Route::get('/prices/{price}/edit', [Providers\price\edit::class, 'edit'])->name('prices.edit');
    Route::put('/prices/{price}', [Providers\price\update::class, 'update'])->name('prices.update');
    Route::delete('/prices/{price}', [Providers\price\delete::class, 'delete'])->name('prices.delete');

    // Products
    Route::get('/products', [Providers\product\index::class, 'index'])->name('products.index');
    Route::get('/products/create', [Providers\product\create::class, 'create'])->name('products.create');
    Route::post('/products', [Providers\product\store::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [Providers\product\edit::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [Providers\product\update::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [Providers\product\delete::class, 'delete'])->name('products.delete');

    // Reviews
    Route::get('/reviews', [Providers\review\index::class, 'index'])->name('reviews.index');
    Route::get('/reviews/create', [Providers\review\create::class, 'create'])->name('reviews.create');
    Route::post('/reviews', [Providers\review\store::class, 'store'])->name('reviews.store');
    Route::get('/reviews/{review}/edit', [Providers\review\edit::class, 'edit'])->name('reviews.edit');
    Route::put('/reviews/{review}', [Providers\review\update::class, 'update'])->name('reviews.update');
    Route::delete('/reviews/{review}', [Providers\review\delete::class, 'delete'])->name('reviews.delete');

    // Users hebben geen create-pagina.
    Route::get('/users', [Providers\user\index::class, 'index'])->name('users.index');
    Route::get('/users/{user}/edit', [Providers\user\edit::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [Providers\user\update::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [Providers\user\delete::class, 'delete'])->name('users.delete');
});

// Ingelogd, maar de rol mag Admin of User zijn. Uitloggen werkt voor beide.
Route::middleware('auth')->group(function () {
    Route::post('/logout', [Providers\auth\logout::class, 'logout'])->name('logout');
});

// user = de rol moet User zijn. Dit zijn de schermen voor een gewone klant.
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/shop', [Providers\shop\home::class, 'home'])->name('shop.home');

    Route::get('/shop/products', [Providers\shop\productIndex::class, 'index'])->name('shop.products.index');
    Route::get('/shop/products/{product}', [Providers\shop\productShow::class, 'show'])->name('shop.products.show');

    Route::get('/shop/orders', [Providers\shop\orderIndex::class, 'index'])->name('shop.orders.index');
    Route::get('/shop/orders/create', [Providers\shop\orderCreate::class, 'create'])->name('shop.orders.create');
    Route::post('/shop/orders', [Providers\shop\orderStore::class, 'store'])->name('shop.orders.store');

    Route::get('/shop/reviews', [Providers\shop\reviewIndex::class, 'index'])->name('shop.reviews.index');
    Route::get('/shop/reviews/create', [Providers\shop\reviewCreate::class, 'create'])->name('shop.reviews.create');
    Route::post('/shop/reviews', [Providers\shop\reviewStore::class, 'store'])->name('shop.reviews.store');

    Route::get('/shop/profile', [Providers\shop\profileEdit::class, 'edit'])->name('shop.profile.edit');
    Route::put('/shop/profile', [Providers\shop\profileUpdate::class, 'update'])->name('shop.profile.update');
});
