<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;

class UserController extends Controller
{
    //
    public $successStatus = 200;

    public function __construct(){
        $this->content = array();
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

    public function register(Request $request) 
    { 
       $name = $request['name'];
        $email = $request['email'];
        $password = $request['password'];
        $user = new User();
        $user->name = $name;
        $user->email = $email;

        $user->password = Hash::make($password);
        $user->save();
    }
    /** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function details() 
    { 
        $user = Auth::user(); 
        return response()->json(['success' => $user], $this-> successStatus); 
    } 
}
