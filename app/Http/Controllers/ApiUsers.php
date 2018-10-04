<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class ApiUsers extends Controller
{

    public function index()
    {
        return User::all();
    }

    public function show($id){
        $result = User::find($id);

        if(!$result){
            return response()->json([
                'status'    => false,
                'message'   => 'error , no data'
            ],401);
        }else{
            return response()->json($result,200);
        }
    }

    public function store(Request $request){
        //die('aaaaaaa');
        $result = $this->validate($request,[
            'full_name'     => 'required',
            'email'         => 'required|unique:users',
            'phone_number'  => 'required',
            'password'      => 'required',
            'role'          => 'required',
        ]);

        //die(print_r($result));

        if($result){
            $data                   = new User;
            $data->full_name        = $request->full_name;
            $data->email            = $request->email;
            $data->phone_number     = $request->phone_number;
            $data->role             = $request->role;
            $data->password         = Hash::make($request->password);
            $data->save();

            return response()->json([
                'status'    => true,
                'message'   => 'Insert Successfuly'
            ],200);
        }else{
            return response()->json([
                'status'   => false,
                'message' => 'error , Insert Not Success'
            ],404);
        }
    }

    public function tesPost(Request $request){
        echo 'aaaa';
        echo $request->nama;
    }

    public function update(Request $request,$id){
        $result = $this->validate($request,[
            'full_name'     => 'required',
            'email'         => 'required',
            'phone_number'  => 'required',
            'password'      => 'required',
            'role'          => 'required',
        ]);
        if($result){
            $data = User::find($id);
            $data->full_name    = $request->full_name;
            $data->email        = $request->email;
            $data->phone_number = $request->phone_number;
            $data->password     = $request->password;
            $data->role         = $request->role;
            $data->save();

            return response()->json([
                'status'    => true,
                'message'   => 'Update Successfuly'
            ],200);
        }else{
            return response()->json([
                'status'  => false,
                'message' => 'error , no data'
            ],404);
        }
    }

    public function destroy($id){
        $result = User::find($id);
        if($result){
            $result->delete();
            return response()->json([
                'status'    => 'true',
                'message'   => 'Delete Successfuly'
            ],200);
        }else{
            return response()->json([
                'status' => 'false',
                'message'=> 'data not found'
            ],404);
        }
    }
}
