<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function addUser()
    {

        return view('admin.add');
    }

    public function saveUser(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $password = $request->password;

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->phone = $phone;
        $user->password = $password;
        $user->role_id = 2;
        $user->save();

        return redirect()->route('dashboard')->with('success', 'User Added Successfully');
    }
    public function editUser($id)
    {
        $users = User::where('id', '=', $id)->first();

        return view('admin.update', compact('users'));

    }
    public function updateUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);
        $id = $request->id;
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;

        User::where('id', '=', $id)->update([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
        ]);
        return redirect()->route('dashboard')->with('success', 'User Updated Successfully');

    }


    public function deleteUser($id)
    {
        User::where('id', '=', $id)->delete();
        return redirect()->route('dashboard')->with('success', 'User Deleted Successfully');


    }



}

