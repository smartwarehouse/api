<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiAuthController extends Controller
{

    public $successStatus = 200;

    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
//            $success['token'] =  $user->createToken('nApp')->accessToken;
            return response()->json([
                'status'    => true,
                'message'   => 'login succesfully',
                'token'     => $user->createToken('nApp')->accessToken,
            ], $this->successStatus);
        }
        else{
            return response()->json([
                'status'     => false,
                'message'   =>  'Unauthorized'
            ], 401);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name'     => 'required',
            'email'         => 'required|email',
            'phone_number'  => 'required',
            'role'          => 'required',
            'password'      => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'    => false,
                'message'   => 'Register Failed',
                'details'     => $validator->errors()
            ], 401);
        }

        $input                  = $request->all();
        $input['password']      = bcrypt($input['password']);
        $user                   = User::create($input);
        $success['token']       =  $user->createToken('nApp')->accessToken;
        $success['name']        =  $user->name;

        return response()->json([
            'status'    => true,
            'message'   => 'Register Success',
            'token'     => $user->createToken('nApp')->accessToken,
            'name'      => $user->name,
        ], $this->successStatus);
    }

    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }
}