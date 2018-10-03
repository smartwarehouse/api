<?php

namespace App\Http\Controllers;

use App\Roles;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class ApiRoles extends Controller
{

    public function index()
    {
        return Roles::all();
    }

    public function show($id){
        $result = Roles::find($id);

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
            'role'         => 'required|unique:roles',
            'description'  => 'required',
        ]);


        $data                   = new Roles;
        $data->role             = $request->role;
        $data->description      = $request->description;
        $data->save();
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'role'         => 'required|unique:roles',
            'description'  => 'required',
        ]);

        $data = User::find($id);
        $data->role             = $request->role;
        $data->description      = $request->description;
        $data->save();
    }

    public function destroy($id){
        $result = Roles::find($id)->delete();
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
