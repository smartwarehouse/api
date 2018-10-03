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
                'status'    => 'true',
                'message' => 'error , no data'
            ],404);
        }else{
            return $result;
        }
    }

    public function store(Request $request){
        $this->validate($request,[
            'full_name'     => 'required',
            'email'         => 'required|unique:users',
            'phone_number'  => 'required',
            'password'      => 'required',
            'role'          => 'required',
        ]);


        $data                   = new User;
        $data->full_name        = $request->full_name;
        $data->email            = $request->email;
        $data->phone_number     = $request->phone_number;
        $data->role             = $request->role;
        $data->password         = Hash::make($request->password);
        $data->save();
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'full_name'     => 'required',
            'email'         => 'required|unique:users',
            'phone_number'  => 'required',
            'password'      => 'required',
            'role'      => 'required',
        ]);

        $data = User::find($id);
        $data->full_name    = $request->title;
        $data->email        = $request->email;
        $data->phone_number = $request->phone_number;
        $data->password     = $request->password;
        $data->role         = $request->role;
        $data->save();
    }

    public function destroy($id){
        $result = User::find($id)->delete();
        if($result){
            return response()->json([
                'status'    => 'true',
                'message'   => 'Delete Successfuly'
            ],200);
        }else{
            return response()->json([
                'status' => 'error , no data'
            ],404);
        }
    }
}
