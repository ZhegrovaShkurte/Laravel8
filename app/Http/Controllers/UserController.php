<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Hash;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function create()
    {

        return view('admin.add');
    }

    public function store(SaveUserRequest $request)
    {

        $validated = $request->validated();

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => Hash::make($validated['password']),
            'role_id' => 2
        ]);

        return redirect()->route('dashboard')->with('success', 'User Added Successfully');
    }

    public function edit(User $user)
    {
        return view('admin.update', compact('user'));

    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone']
        ]);
        return redirect()->route('dashboard')->with('success', 'User Updated Successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('dashboard')->with('success', 'User Deleted Successfully');
    }
}

