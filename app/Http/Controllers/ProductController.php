<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductResourceCollection;

class ProductController extends Controller
{
    //

    public function show(Product $product)
    {
        //
        return new ProductResource(Product::findOrFail($id));
    }

    public function index(){
        return new ProductResourceCollection(ProductResource::collection(Product::all()));
    }
}
