<?php

use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

// client => localhost:8000/
Route::get('/', function () {
    return view('welcome');
});


// Route::get('/home', function () {
//     $person = [
//         'name' => 'zain',
//         'institute' => "AKTI",
//         'batch' => 6,
//         'duration' => "2 Months"
//     ];

//     $fruits = ['watermelon', 'apple', 'banana', 'strawberry'];
//     return view('home', [
//         'fruits' => $fruits,
//         'personDetails' => $person
//     ]);
// });


Route::get('/web/index', [WebsiteController::class, 'webIndexPage'])->name('web-index');
Route::get('/web/master', [WebsiteController::class, 'webMasterPage'])->name('web-master');
Route::get('/web/shop', [WebsiteController::class, 'shopPage'])->name('web-shop');
// Route::get('/home', [WebsiteController::class, 'home'])->name('web-home');
// Route::get('/singleproduct', [WebsiteController::class, 'singleProduct'])->name('web-single-product');
// Route::get('/checkout', [WebsiteController::class, 'checkout'])->name('web-checkout');
// Route::get('/cart', [WebsiteController::class, 'cart'])->name('web-cart');

// Route::get('/home33', function () {
//     // return "<h1> Hello HTML </h1><script>alert('hello js')</script>";
//     $fruits = ["watermelon", "strawberry", 'banana'];
//     return view('abc', ['fruits' => $fruits]);

// });

// element.addEventListener('click', funciton(){
// })

// Admin Routes


Route::get('/admin/index', [WebsiteController::class, 'adminIndexPage'])->name('admin-index');
