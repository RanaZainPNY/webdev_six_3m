<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

use App\Models\User;

class WebsiteController extends Controller
{

    public function webIndexPage()
    {


        return view('web.index');

    }

    public function webMasterPage()
    {
        return view('web.webmaster');
    }
    function home()
    {
        // Extract user info from database
        $user = User::all()->first();

        // dump($user['id']);
        // dump($user['name']);
        // dump($user['email']);
        // dump($user['password']);
        // die();

        $person = [
            'name' => 'zain',
            'institute' => "AKTI",
            'batch' => 6,
            'duration' => "2 Months"
        ];

        $fruits = ['watermelon', 'apple', 'banana', 'strawberry'];
        return view('home', [
            'fruits' => $fruits,
            'personDetails' => $person,
            'user' => $user,
        ]);
    }

    function shopPage()
    {
        $products = Product::all();
        return view('web.shop', [
            'products' => $products
        ]);
    }

    function singleProduct()
    {
        return "Single Product";
    }
    function checkout()
    {
        return "Checkout";
    }
    function cart()
    {
        return "cart";
    }


    public function adminIndexPage()
    {
        // fetching data from database
        $products = Product::all();

        return view('admin.adminindex', [
            'products' => $products
        ]);
    }
    public function adminMasterPage()
    {
        return view('admin.adminmaster');
    }
    public function webCheckoutPage()
    {
        return view('web.checkout');
    }
}
