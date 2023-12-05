<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $users=User::paginate(10);
        return view('pages.dashboard',['users'=>$users]);
    }
     
}
