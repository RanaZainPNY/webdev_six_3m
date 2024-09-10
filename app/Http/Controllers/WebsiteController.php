<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;

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

    function shopPage($brand_id = null)
    {
        // Eloquent ORM
        // $brands = Brand::all();

        // Via Query Builder
        // $brands = DB::table('brands')->get();


        // Raw Statements
        // $brands = DB::statement('SELECT * from brands');
        $brands = DB::select('SELECT * FROM brands' );


        // $brands = DB::table('brands')
        //     ->where('id', '<', 4)
        //     ->get();



        //  Eloquent ORM
        $products = Product::all();

        // filtering pipeline
        // by brand

        if ($brand_id != null) {
            $brand = Brand::findOrFail($brand_id);

            // Eloquent ORM
            $products = $brand->products;

            // Queruy Builder
            // $products = DB::table('brands')
            //     ->join('products', 'brands.id', '=', 'products.brand_id')
            //     ->select('products.*')
            //     ->where('brands.id', '=', $brand_id)
            //     ->get();




            dd($products);


            // $filtered = [];
            // foreach ($products as $product) {
            //     if ($product->price > 100 && $product->price < 1000) {
            //         array_push($filtered, $product);
            //     }
            // }
            // $products = $filtered;
        }



        return view('web.shop', [
            'products' => $products,
            'brands' => $brands,
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

    function blog()
    {
        return view('web.blog');
    }
}
