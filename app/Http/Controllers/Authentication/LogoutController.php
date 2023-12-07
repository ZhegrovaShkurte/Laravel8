<?php

namespace App\Http\Controllers\Authentication;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class LogoutController extends Controller
{
   public function userLogout()
   {
      Session::flush();
      Auth::logout();
      return redirect('login');
   }
}
