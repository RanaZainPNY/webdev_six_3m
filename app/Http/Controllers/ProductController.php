<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use App\Models\Brand;

class ProductController extends Controller
{
    //

    function update(Request $request)
    {
        // dd($request->id);
        $product = Product::findOrFail($request->id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->sku = $request->sku;
        $product->description = $request->description;
        $product->brand_id = $request->brand_id;
        $product->save();

        if ($request->image != "") {
            // delete old image
            File::delete(public_path('uploads/products/' . $product->image));
            // Create new image file name
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext; // unique Image Name

            //save image to the public directory
            $image->move(public_path('uploads/products/'), $imageName);
            $product->image = $imageName;
            $product->save();

        }

        return redirect()->route('admin-index');
    }


    function create()
    {

        $brands = Brand::all();
        // dd($brands);

        return view('admin.create_prod_form', [
            'brands' => $brands
        ]);
    }
    function store(Request $request)
    {
        // dump($request->name);
        // dump($request->price);
        // dump($request->sku);
        // dd($request->image);

        $product = new Product();
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->brand_id = $request->brand_id;

        // new record in data
        $product->save();



        if ($request->image != "") {
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . "." . $ext; // Unique image name;

            // save image to products directory
            $image->move(public_path('/uploads/products'), $imageName);

            // save image in the database
            $product->image = $imageName;
            $product->save();
        }



        return redirect()->route("admin-index");
    }

    function delete($id)
    {
        // dd($id);
        $product = Product::findOrFail($id);
        if ($product->image != "") {
            // delete associated image file
            File::delete(public_path('/uploads/products/' . $product->image));
        }
        $product->delete();

        return redirect()->route('admin-index');
    }

    function edit($id)
    {
        // dd($id);
        $product = Product::findOrFail($id);
        $brands = Brand::all();
        return view('admin.edit_prod_form', [
            'product' => $product,
            'brands' => $brands
        ]);
    }

    function addToCart(string $id)
    {
        // dd($id);
        // Session Based Cart

        // Cart Structure
        // $cart = [
        //     '18' => [
        //         'name' => 'abc',
        //         'price' => 239,
        //         'sku' => '3939UU',
        //         'description' => "lorem ipsum",
        //         'image' => '399303393.jpg',
        //     ],
        //     '21' => [

        //     ],

        // ];

        // $cart['18']['name']
        // $cart['21']['description']

        // dd($cart);

        // extracting product from db
        $product = Product::findOrFail($id);

        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // when product will be added first time in the cart
            $cart[$id] = [
                "name" => $product->name,
                "sku" => $product->sku,
                "price" => $product->price,
                "description" => $product->description,
                "image" => $product->image,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back();
    }

    function getCart()
    {
        $cart = session()->get('cart');
        dd($cart);
    }

    function removeFromCart($id)
    {
        // dd($id);
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->route('web-shop');
    }

}
