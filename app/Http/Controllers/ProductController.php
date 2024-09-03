<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;

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
        return view('admin.create_prod_form');
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
        return view('admin.edit_prod_form', ['product' => $product]);
    }


}
