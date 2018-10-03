<?php

namespace App\Http\Controllers;

use App\Type;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class ApiType extends Controller
{

    public function index()
    {
        return Type::all();
    }

    public function show($id){
        $result = Type::find($id);

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
            'name'          => 'required',
            'description'   => 'required',
        ]);


        $data                = new Type;
        $data->name          = $request->name;
        $data->description   = $request->description;
        $data->save();
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'name'          => 'required',
            'description'   => 'required',
        ]);

        $data = User::find($id);
        $data->name          = $request->name;
        $data->description   = $request->description;
        $data->save();
    }

    public function destroy($id){
        $result = Type::find($id)->delete();
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
