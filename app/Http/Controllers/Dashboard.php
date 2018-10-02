<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function userAdd(){

    }
public function index()
    {
        $users=\App\Users::all();
        return view('Dashboard.users.show',compact('Users'));
    }

}
