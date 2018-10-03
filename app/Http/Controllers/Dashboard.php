<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function userAdd(){

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
}