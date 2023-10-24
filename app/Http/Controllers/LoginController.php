<?php
/*
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   public function login(){
        
    if (Auth::attempt($request->only('email', 'password')))
    {
        return redirect()->route('home');
    }
    }
}
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'], 
        ]);

        if (Auth::attempt($credentials))
        {
            return view('home.index');
        }

        return "<h2>Username or Password Invalid</h2>";
    }
}

?>