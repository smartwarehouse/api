<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function userAdd(){

    }

    public function userIndex()
    {
        $data = User::all();
        return view('dashboard.user.show',compact('data'));
    }
}
