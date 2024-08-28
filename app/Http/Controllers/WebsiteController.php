<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class WebsiteController extends Controller
{
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
            'user' => $user
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
