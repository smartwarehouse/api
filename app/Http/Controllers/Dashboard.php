<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function userAdd(Request $request, $id)
    {
        $data = new User->find($id);
        $data->full_name     = $request->full_name;
        $data->email         = $request->email;
        $data->phone_number  = $request->phone_number;
        $data->password      = Hash::make($request->password);
        $data->role          = $request->role;
        $data->save();
        return redirect()->route('dashboard.user.add')->with('alert-success','Berhasil Menambahkan Data!');
    }
    public function index()
    {
        $users=User::all();
            return view('dashboard.user.show',['Users' => $users]);
    }

    public function userIndex()
    {
        $data=User::all();
        return view('dashboard.user.show',['users' => $data]);
    }

    public function userDestroy($id)
    {
        $result =   User::find($id);
        if($result){
            User::find($id)->delete();
            $data = "delete success";
        }else{
            $data = "delete not success";
        }
        return view('dashboard.user.destroy',['message' => $data]);
    }
}