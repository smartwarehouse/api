<?php

namespace App\Http\Controllers;

use App\Notification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class ApiNotification extends Controller
{

    public function index()
    {
        return Notification::all();
    }

    public function show($id){
        $result = Notification::find($id);

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
            'material'     => 'required',
            'title'        => 'required',
            'description'  => 'required',
        ]);


        $data                   = new Notification;
        $data->material         = $request->material;
        $data->title            = $request->title;
        $data->description      = $request->description;
        $data->save();
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'material'     => 'required',
            'title'        => 'required',
            'description'  => 'required',
        ]);

        $data = User::find($id);
        $data->material         = $request->material;
        $data->title            = $request->title;
        $data->description      = $request->description;
        $data->save();
    }

    public function destroy($id){
        $result = Notification::find($id)->delete();
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
