<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $users=User::paginate(3);
        return view('pages.dashboard',['users'=>$users]);
    }
     
}
