<?php

namespace App\Http\Controllers\Authentication;

use Hash;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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