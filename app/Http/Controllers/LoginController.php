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

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function login(LoginRequest $request)
    {

        $validated=$request->validated();

        if  (Auth::attempt($validated))
        {

          return redirect()->route('home')->with('success', 'Login was successful');
        } else {
          return redirect()->route('login')->with('error', 'Credentials were wrong');
        }
            
}
}