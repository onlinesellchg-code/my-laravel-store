<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

$categories = [
    ['name' => 'دیجیتال', 'icon' => '💻', 'slug' => 'digital'],
    ['name' => 'خانه و آشپزخانه', 'icon' => '🏠', 'slug' => 'home'],
    ['name' => 'ابزار و تجهیزات', 'icon' => '🔧', 'slug' => 'tools'],
    ['name' => 'پوشاک', 'icon' => '👕', 'slug' => 'fashion'],
    ['name' => 'ورزش و سفر', 'icon' => '🎒', 'slug' => 'sport'],
    ['name' => 'زیبایی و سلامت', 'icon' => '✨', 'slug' => 'beauty'],
];

$products = [
    ['id' => 1, 'name' => 'هدفون بی‌سیم مدل Pro X', 'price' => 2450000, 'old_price' => 2890000, 'category' => 'دیجیتال', 'emoji' => '🎧'],
    ['id' => 2, 'name' => 'ساعت هوشمند سری 5', 'price' => 3890000, 'old_price' => 4250000, 'category' => 'دیجیتال', 'emoji' => '⌚'],
    ['id' => 3, 'name' => 'ست ابزار 32 پارچه', 'price' => 1790000, 'old_price' => null, 'category' => 'ابزار و تجهیزات', 'emoji' => '🧰'],
    ['id' => 4, 'name' => 'قمقمه استیل ورزشی', 'price' => 690000, 'old_price' => 790000, 'category' => 'ورزش و سفر', 'emoji' => '🥤'],
    ['id' => 5, 'name' => 'چراغ مطالعه LED', 'price' => 540000, 'old_price' => null, 'category' => 'خانه و آشپزخانه', 'emoji' => '💡'],
    ['id' => 6, 'name' => 'کوله‌پشتی روزمره', 'price' => 1290000, 'old_price' => 1490000, 'category' => 'ورزش و سفر', 'emoji' => '🎒'],
    ['id' => 7, 'name' => 'تیشرت نخی ساده', 'price' => 490000, 'old_price' => 590000, 'category' => 'پوشاک', 'emoji' => '👕'],
    ['id' => 8, 'name' => 'اسپیکر قابل حمل', 'price' => 1590000, 'old_price' => null, 'category' => 'دیجیتال', 'emoji' => '🔊'],
];

/*
|--------------------------------------------------------------------------
| فروشگاه
|--------------------------------------------------------------------------
*/

Route::get('/', function () use ($categories, $products) {
    return view('home', compact('categories', 'products'));
})->name('home');

Route::get('/shop', function () use ($categories, $products) {
    return view('shop', compact('categories', 'products'));
})->name('shop');

Route::get('/category/{slug}', function (string $slug) use ($categories, $products) {
    $category = collect($categories)->firstWhere('slug', $slug);

    abort_unless($category, 404);

    $items = collect($products)
        ->where('category', $category['name'])
        ->values()
        ->all();

    return view('category', [
        'category' => $category,
        'products' => $items,
    ]);
})->name('category');

Route::get('/product/{id}', function (int $id) use ($products) {
    $product = collect($products)->firstWhere('id', $id);

    abort_unless($product, 404);

    return view('product', compact('product'));
})->name('product');

Route::get('/cart', fn () => view('cart'))->name('cart');

/*
|--------------------------------------------------------------------------
| ورود ادمین
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', function () {
    if (session('admin_authenticated')) {
        return redirect()->route('admin.dashboard');
    }

    return view('admin.login');
})->name('admin.login');

Route::post('/admin/login', function (Request $request) {
    $request->validate([
        'username' => ['required', 'string'],
        'password' => ['required', 'string'],
    ]);

    $validUsername = hash_equals(
        (string) env('ADMIN_USERNAME'),
        (string) $request->input('username')
    );

    $validPassword = hash_equals(
        (string) env('ADMIN_PASSWORD'),
        (string) $request->input('password')
    );

    if (!$validUsername || !$validPassword) {
        return back()
            ->withErrors([
                'login' => 'نام کاربری یا رمز عبور اشتباه است.',
            ])
            ->withInput();
    }

    $request->session()->regenerate();
    $request->session()->put('admin_authenticated', true);

    return redirect()->route('admin.dashboard');
})->name('admin.login.submit');

Route::get('/admin', function () use ($categories, $products) {
    if (!session('admin_authenticated')) {
        return redirect()->route('admin.login');
    }

    return view('admin.dashboard', compact('categories', 'products'));
})->name('admin.dashboard');

Route::post('/admin/logout', function (Request $request) {
    $request->session()->forget('admin_authenticated');
    $request->session()->regenerateToken();

    return redirect()->route('admin.login');
})->name('admin.logout');
