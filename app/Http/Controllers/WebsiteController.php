<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    //
    function home()
    {
        $person = [
            'name' => 'zain',
            'institute' => "AKTI",
            'batch' => 6,
            'duration' => "2 Months"
        ];

        $fruits = ['watermelon', 'apple', 'banana', 'strawberry'];
        return view('home', [
            'fruits' => $fruits,
            'personDetails' => $person
        ]);
    }

    function shop()
    {
        return "shop page";
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


}
