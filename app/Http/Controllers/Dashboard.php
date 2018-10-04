<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function userAdd(){

    }
<<<<<<< HEAD
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
}
=======

    public function userIndex()
    {
        $data = User::all();
        return view('dashboard.user.show',compact('data'));
    }
}
>>>>>>> 60aad49d563f58dce5caeab437fa9fb423bbe71e
