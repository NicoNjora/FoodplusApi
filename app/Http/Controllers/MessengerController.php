<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessengerController extends Controller
{
    //

    public function index(){
        return new Messenger(MessengerResource::collection(Messenger::all()));
    }
    public function profile($id){
        return new MessengerResource(Messenger::findOrFail($id));
    }
    public function login(Request $request){
        $email = $request['email'];
        $password = $request['password'];
        $messenger = Messenger::where('email', $email)->firstOrFail();
        if(Hash::check($password, $messenger->password)){
            return new MessengerResource($messenger);
        }
        return null;
    }
    //registering new gym subscriber
    public function add(Request $request){
        $name = $request['name'];
        $email = $request['email'];
        $password = $request['password'];
        $messenger = new Messenger();
        $messenger->name = $name;
        $messenger->email = $email;
        $messenger->password = Hash::make($password);
        $messenger->save();
        return new MessengerResource($subscriber);
    }
    //updating messenger profile
    public function update(Request $request){
        $id = $request['id'];
        $name = $request['name'];
        $email = $request['email'];

        $messenger = Messenger::findOrFail($id);

        $messenger->name = $name;
        $messenger->email = $email;
        
        $messenger->save();
        return new MessengerResource($messenger);
    }
}
