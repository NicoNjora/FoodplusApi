<?php

namespace App\Http\Controllers;
use App\Order_Product;
use App\Product;
use App\Order;

use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    public function orderAdd(Request $request){
        $user_id = $request['user_id'];
        $branch_id = $request['branch_id'];
        $date = $request['date'];


        $order = new Order;



        $order->user_id = $user_id;
        $order->branch_id = $branch_id;
        $order->date = $date;

        $order->save();

        $insertedId = $order->id;
        foreach ($request['products'] as $item){

            $orderproduct=new Order_Product;
            $quantity=$item['quantity'];
            $order_id=$insertedId;
            $product_id=$item['product_id'];

            $orderproduct->order_id=$order_id;
            $orderproduct->product_id=$product_id;
            $orderproduct->quantity=$quantity;
            $orderproduct->save();

        }

            }

    public function retrieve(Request $request){


    }
    //
}
