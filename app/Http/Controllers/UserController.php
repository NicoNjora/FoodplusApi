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

    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
		        $user = Auth::user();
		        $this->content['token'] =  $user->createToken('Foodplus')->accessToken;
		        $status = 200;
    	}
	    else{
	        $this->content['error'] = "Unauthorised";
	        $status = 401;
	    }
     	return response()->json($this->content, $status);    
    }

    public function register(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email', 
            'password' => 'required', 
            'c_password' => 'required|same:password', 
        ]);
		if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }

		$input = $request->all(); 
        $input['password'] = bcrypt($input['password']); 
        $user = User::create($input); 
        $success['token'] =  $user->createToken('Foodplus')-> accessToken; 
	    $success['name'] =  $user->name;

		return response()->json(['success'=>$success], $this-> successStatus); 
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
