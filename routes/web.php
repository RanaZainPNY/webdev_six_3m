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


Route::get('/home', [WebsiteController::class, 'home'])->name('web-home');
Route::get('/shop', [WebsiteController::class, 'shop'])->name('web-shop');
Route::get('/singleproduct', [WebsiteController::class, 'singleProduct'])->name('web-single-product');
Route::get('/checkout', [WebsiteController::class, 'checkout'])->name('web-checkout');
Route::get('/cart', [WebsiteController::class, 'cart'])->name('web-cart');



// element.addEventListener('click', funciton(){
// })
