<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function create()
    {
        return view('profile.edit');
    }

 
        public function update(ProfileUpdateRequest $request)
        {
        auth()->user()->update([
        'name' -> $request->name,
        'email' -> $request->email
        ]);
        
                return redirect()->route('home')->with('success', 'Update was successful');
        }
    }