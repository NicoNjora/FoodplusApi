<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Messenger;
use Illuminate\Support\Facades\Auth; 
use Validator;
use App\Http\Resources\MessengerResource;
use App\Http\Resources\MessengerResourceCollection;
use Illuminate\Support\Facades\Hash;


class MessengerController extends Controller
{
    //
    public function new()
    {
        return view('/messenger');
    }

    public function index(){
        
         MessengerResource::withoutWrapping();
        return new Messenger(MessengerResource::collection(Messenger::all()));
    }
    public function profile($id){
        return new MessengerResource(Messenger::findOrFail($id));
    }
    // public function login(Request $request){
    //     $email = $request['email'];
    //     $password = $request['password'];
    //     $messenger = Messenger::where('email', $email)->firstOrFail();
    //     if(Hash::check($password, $messenger->password)){
    //         return new MessengerResource($messenger);
    //     }
    //     return null;
    // }
    //registering new gym subscriber
    public function add(Request $request){
        $name = $request['name'];
        $email = $request['email'];
        $contacts = $request['contacts'];
        $branch_id = $request['branch_id'];
        $password = $request['password'];
        $messenger = new Messenger();
        $messenger->name = $name;
        $messenger->email = $email;
        $messenger->contacts = $contacts;
        $messenger->branch_id = $branch_id;

        $messenger->password = Hash::make($password);
        $messenger->save();
        return new MessengerResource($messenger);
    }
    //updating messenger profile
    public function update(Request $request){
        $id = $request['id'];
        $name = $request['name'];
        $email = $request['email'];
        $contacts = $request['contacts'];

        $messenger = Messenger::findOrFail($id);

        $messenger->name = $name;
        $messenger->email = $email;
        $messenger->contacts = $contacts;
        
        $messenger->save();
        return new MessengerResource($messenger);
    }



    public function login(Request $request){

        $email = $request['email'];
        $password = $request['password'];
        $messenger = Messenger::where('email', $email)->firstOrFail();
        if(Hash::check($password, $messenger->password)){

            $this->content['user'] = new MessengerResource($messenger);
            $status = 200;
            return response()->json($this->content, $status);
        }
        else{
            $this->content['error'] = "Unauthorised";
            $status = 401;
        }
        return response()->json($this->content, $status);    
    }
}

