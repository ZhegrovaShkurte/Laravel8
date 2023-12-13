<?php

namespace App\Http\Controllers\Authentication;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterUserRequest;

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


