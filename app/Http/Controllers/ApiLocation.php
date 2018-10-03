<?php

namespace App\Http\Controllers;

use App\Location;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class ApiLocation extends Controller
{

    public function index()
    {
        return Location::all();
    }

    public function show($id){
        $result = Location::find($id);

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
            'location_code' => 'required|unique:location',
            'description'  => 'required',
        ]);


        $data                   = new Location;
        $data->location_code        = $request->location_code;
        $data->description          = $request->description;
        $data->save();
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'location_code'     => 'required',
            'description'         => 'required|unique:users',
        ]);

        $data = Location::find($id);
        $data->location_code    = $request->location_code;
        $data->description      = $request->description;
        $data->save();
    }

    public function destroy($id){
        $result = Location::find($id)->delete();
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
