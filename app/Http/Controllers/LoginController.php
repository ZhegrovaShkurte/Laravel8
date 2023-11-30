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

  public function attemptLogin(LoginRequest $request)
  {
    $validated = $request->validated();

    if (Auth::attempt($validated)) {
      return redirect()->route('home');
    } else {
      return redirect()->route('login')->with('error', 'Credentials were wrong');
    }

  }
}