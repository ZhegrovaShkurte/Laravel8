<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data=User::all();
        return view('pages.dashboard',['user'=>$data]);
    }
    
}
