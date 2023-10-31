<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $users=User::all();
        return view('pages.dashboard',['users'=>$users]);
    }
     
}
