<?php

use App\Http\Controllers\ProductController;
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
Route::get('/web/blog', [WebsiteController::class, 'blog'])->name('web-blog');

Route::get('/web/addtocart/{id}', [ProductController::class, 'addToCart'])->name('web-add-to-cart');
Route::get('/web/removefromcart/{id}', [ProductController::class, 'removeFromCart'])->name('web-remove-from-cart');
Route::get('/web/getcart', [ProductController::class, 'getCart'])->name('web-get-cart');

Route::get('/web/checkout', [WebsiteController::class, 'webCheckoutPage'])->name('web-checkout');
Route::post('/web/placeorder', [WebsiteController::class, 'placeorder'])->name('web-place-order');

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
Route::get('/admin/master', [WebsiteController::class, 'adminMasterPage'])->name('admin-master');
Route::get('admin/orders', [WebsiteController::class, 'orders'])->name('admin-orders');
Route::get('admin/orders/delete/{id}', [WebsiteController::class, 'deleteOrder'])->name('delete-order');

Route::get('admin/products/create', [ProductController::class, 'create'])->name('admin-product-create');
Route::post('admin/products/store', [ProductController::class, 'store'])->name('admin-products-store');

Route::get('admin/products/delete/{id}', [ProductController::class, 'delete'])->name('admin-products-delete');
Route::get('admin/products/edit/{id}', [ProductController::class, 'edit'])->name('admin-products-edit');
Route::put('admin/products/update', [ProductController::class, 'update'])->name('admin-products-update');
// admin/products/delete/1
// admin/products/delete/2
// admin/products/delete/3
