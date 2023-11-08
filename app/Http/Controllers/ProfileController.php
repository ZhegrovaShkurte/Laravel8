<?php

namespace App\Http\Controllers;


use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit');
    }


    public function update(UpdateProfileRequest $request)
    {
        try {
            auth()->user()->update($request->validated());
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
        return redirect()->route('home')->with('success', 'Update was successful');
    }
}