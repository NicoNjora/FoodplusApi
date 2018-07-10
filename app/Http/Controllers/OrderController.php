<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Http\Resources\OrderResource;

class OrderController extends Controller
{
    //

    public function index(User $user){

        return new OrderResource(Order::findOrFail($user));
    }

    public function add(Request $request)
    {
      
        // $user_id = $request['user_id'];
        // $branch_id = $request['branch_id'];
        // $date = $request['date_id'];

        // $product = new Product;

        // $product->name = $name;
        // $product->product_image = $product_image;
        // $product->price = $price;

        // $product->save();

        // return new ProductResource($product);
    }
}
