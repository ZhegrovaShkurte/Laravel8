<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Hash;

class RegisterController extends Controller
{
  public function index()
  {
    return view('pages.register');
  }

  public function registerUser(RegisterUserRequest $request)
  {
    try {
      $validated = $request->validated();

      User::create($validated);
  
      if (Auth::attempt($validated)) {
        return redirect()->route('home')->with('success', 'Register was successful');
      } else {
        return redirect()->route('register')->with('error', 'Authentication failed');
      }
    }  catch(\Exception $exception) {
      return back()->with('error', $exception->getMessage());
    }
      
  }
}


