<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('user.profile-edit');
    }

    public function update(UpdateProfileRequest $request)
    {
        try {
            $validated = $request->validated();

            auth()->user()->update($validated);
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
        return redirect()->route('home')->with('success', 'Update was successful');
    }
}