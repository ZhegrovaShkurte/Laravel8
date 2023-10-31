<?php

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
            if(auth()->user()->roleid==1){
               return redirect()->route('dashboard');
            }else{
                return redirect()->route('home');
            }
         // return redirect()->route('home')->with('success', 'Login was successful');
        } else {
          return redirect()->route('login')->with('error', 'Credentials were wrong');
        }
            
}
}