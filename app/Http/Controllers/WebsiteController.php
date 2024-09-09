<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
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

    public function placeorder(Request $request)
    {
        // dd($request);
        // DB::table('orders')]
        $order = new Order();
        $order->firstname = $request->firstname;
        $order->lastname = $request->lastname;
        $order->address = $request->contact;
        $order->email = $request->email;
        $order->contact = $request->contact;


        $cart = session()->get('cart');
        if ($cart) {
            $total = 0;
            foreach ($cart as $id => $details) {
                $total += $details['quantity'] * $details['price'];
            }

            $order->total = $total;
            $order->save();
            // empty the cart
            session()->forget('cart');
            return redirect()->back();

        } else {
            echo "cart is empty";
        }

    }

    function orders()
    {
        $orders = Order::all();
        return view('admin.orders', [
            'orders' => $orders
        ]);
    }

    function deleteOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->back();
    }

    function blog(){
        return view('web.blog');
    }
}
