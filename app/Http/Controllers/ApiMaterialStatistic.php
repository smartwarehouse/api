<?php

namespace App\Http\Controllers;

use App\MaterialStatistic;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class ApiMaterialStatistic extends Controller
{

    public function index()
    {
        return MaterialStatistic::all();
    }

    public function show($id){
        $result = MaterialStatistic::find($id);

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
            'qty'       => 'required',
            'type'      => 'required',
            'user'      => 'required',
            'material'  => 'required',
        ]);


        $data             = new MaterialStatistic;
        $data->qty        = $request->qty;
        $data->type       = $request->type;
        $data->user       = $request->user;
        $data->material   = $request->material;
        $data->save();
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'qty'       => 'required',
            'type'      => 'required',
            'user'      => 'required',
            'material'  => 'required',
        ]);

        $data = MaterialStatistic::find($id);
        $data->qty        = $request->qty;
        $data->type       = $request->type;
        $data->user       = $request->user;
        $data->material   = $request->material;
        $data->save();
    }

    public function destroy($id){
        $result = MaterialStatistic::find($id)->delete();
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
