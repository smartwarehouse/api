<?php

namespace App\Http\Controllers;

use App\Rfid;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class ApiRfid extends Controller
{

    public function index()
    {
        return Rfid::all();
    }

    public function show($id){
        $result = Rfid::find($id);

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
            'rfid_code'         => 'required|unique:rfid',
        ]);


        $data                   = new User;
        $data->rfid_code        = $request->rfid_code;
        $data->save();
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'rfid_code'     => 'required',
        ]);

        $data = Rfid::find($id);
        $data->rfid_code        = $request->rfid_code;
        $data->save();
    }

    public function destroy($id){
        $result = Rfid::find($id)->delete();
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
