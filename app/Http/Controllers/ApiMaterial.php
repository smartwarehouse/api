<?php

namespace App\Http\Controllers;

use App\Material;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class ApiMaterial extends Controller
{

    public function index()
    {
        return Material::all();
    }

    public function show($id){
        $result = Material::find($id);

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
            'material_code'     => 'required|unique:material',
            'name'              => 'required',
            'qty'               => 'required',
            'image'             => 'required',
            'rfid'              => 'required',
            'location'          => 'required',
            'material_category' => 'required',
        ]);


        $data                       = new Material;
        $data->material_code        = $request->material_code;
        $data->name                 = $request->name;
        $data->qty                  = $request->qty;
        $data->image                = $request->image;
        $data->rfid                 = $request->rfid;
        $data->location             = $request->location;
        $data->material_category    = $request->material_category;
        $data->save();
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'material_code'     => 'required|unique:material',
            'name'              => 'required',
            'qty'               => 'required',
            'image'             => 'required',
            'rfid'              => 'required',
            'location'          => 'required',
            'material_category' => 'required',
        ]);

        $data = User::find($id);
        $data->material_code        = $request->material_code;
        $data->name                 = $request->name;
        $data->qty                  = $request->qty;
        $data->image                = $request->image;
        $data->rfid                 = $request->rfid;
        $data->location             = $request->location;
        $data->material_category    = $request->material_category;
        $data->save();
    }

    public function destroy($id){
        $result = Material::find($id)->delete();
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
