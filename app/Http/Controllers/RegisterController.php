<?php
/*
namespace App\Http\Controllers;


use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    
    public function register(Request $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->route('login')->with('success', 'User registered');
    }


}
*/
?>
<?php

namespace App\Http\Controllers;

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

    public function register(Request $request)
    {
        $input = $request->all();

        User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password'])
        ]);
        return view('home.index');
    }
}


