<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Hash;

class RegisterController extends Controller
{
  public function create()
  {
    return view('pages.register');
  }

  public function register(RegisterRequest $request)
  {
    $validated = $request->validated();

    User::create([
      'name' => $validated['name'],
      'email' => $validated['email'],
      'phone' => $validated['phone'],
      'password' => Hash::make($validated['password']),
      'role_id' => 2
    ]);

    if (Auth::attempt($validated)) {
      return redirect()->route('home')->with('success', 'Register was successful');
    } else {
      return redirect()->route('register')->with('error', 'Credentials were wrong');
    }
  }
}


