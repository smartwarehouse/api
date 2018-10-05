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
                'status'    => false,
                'message' => 'error , no data'
            ],404);
        }else{
            return $result;
        }
    }

    public function store(Request $request){
        if(Notification::create($request->all())){

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

    public function update(Request $request,$id){
        $result = Notification::findOrFail($id);

        if($result->update($request->all())){
            return response()->json([
                'status'    => true,
                'message'   => 'Update Successfuly'
            ],200);
        }else{
            return response()->json([
                'status'  => false,
                'message'=> 'update not success'
            ],404);
        }
    }

    public function destroy($id){

        $result = Notification::find($id);

        if($result){

            Notification::find($id)->delete();

            return response()->json([
                'status'    => true,
                'message'   => 'Delete Successfuly'
            ],200);
        }else{
            return response()->json([
                'status' => 'false',
                'message'=> 'delete not success'
            ],404);
        }
    }
}
