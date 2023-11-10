<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Traits\SaveMedias;
use Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Media;

class UserController extends Controller
{
     use SaveMedias;

    public function create()
    {

        return view('admin.add');
    }

    public function store(SaveUserRequest $request)
    {
       try {
    
        $validated = $request->validated();

            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'password' => Hash::make($validated['password']),
                'role_id' => 2
            ]);
    
    
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
                     
        }
        return redirect()->route('dashboard')->with('success', 'User Added Successfully');
    }
    public function edit(User $user)
    {
        return view('admin.update', compact('user'));

    }

    public function update(UpdateUserRequest $request, User $user)
    {
         try {
            $validated = $request->validated();

            $user->update([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone']
            ]);
         } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
         }      
        return redirect()->route('dashboard')->with('success', 'User Updated Successfully');
    }

    public function destroy(User $user)
    {   
        try {
            $user->delete();
        } catch(\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
        return redirect()->route('dashboard')->with('success', 'User Deleted Successfully');
    }
}
