<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductResourceCollection;

class ProductController extends Controller
{
    //

    public function new()
    {
        return view('/product');
    }

    public function show(Product $product)
    {
        //
        return new ProductResource(Product::findOrFail($id));
    }

    public function index(){
        
        ProductResource::withoutWrapping();
        return new ProductResourceCollection(ProductResource::collection(Product::all()));
    }

    public function add(Request $request)
    {
      
        $name = $request['name'];
        $product_image = $request['product_image'];
        $price = $request['price'];

        $product = new Product;

        $product->name = $name;
        $product->product_image = $product_image;
        $product->price = $price;

        $product->save();

        return new ProductResource($product);
    }
}
