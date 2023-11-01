<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit');
    }

 
        public function update(ProfileUpdateRequest $request)
        {
            auth()->user()->update($request->validated());
          
        
                return redirect()->route('home')->with('success', 'Update was successful');
        }
    }