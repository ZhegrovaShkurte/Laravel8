<?php

namespace App\Http\Controllers\Admin;

use Hash;
use Excel;
use DataTables;
use App\Models\User;
use App\Traits\SaveMedias;
use App\Exports\UserExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveUserRequest;
use App\Http\Requests\UpdateUserRequest;


class UserController extends Controller {
    use SaveMedias;

    public function index(Request $request) {
        if($request->ajax()) {
            $data = User::select('*');
            return Datatables::of($data)
                ->addColumn('action', function ($user) {
                    return view('admin.user-actions', compact('user'));
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.user-datatable');
    }
    public function create() {

        return view('admin.user-create');
    }
    public function store(SaveUserRequest $request) {
        $file = $request->image;

        try {

            $result = DB::transaction(function () use ($request, $file) {
                $validated = $request->validated();

                $user = User::create([
                    'name' => $validated['name'],
                    'email' => $validated['email'],
                    'phone' => $validated['phone'],
                    'password' => Hash::make($validated['password']),
                    'role_id' => 2

                ]);
                $this->saveMedias($request, $file, $user->id, 'profile', 0);
            });

        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
        return redirect()->route('dashboard')->with('success', 'User Added Successfully');
    }
    public function edit(User $user) {
        return view('admin.user-edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user) {
        try {

            $validated = $request->validated();

            $user->update($validated);

        } catch (\Exception $exception) {

            return back()->with('error', $exception->getMessage());
        }
        return redirect()->route('dashboard')->with('success', 'User Updated Successfully');
    }

    public function destroy(User $user) {
        try {
            $user->delete();
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
        return redirect()->route('dashboard')->with('success', 'User Deleted Successfully');
    }

    public function exportExcel() {
        return Excel::download(new UserExport, 'user-excel.xlsx');
    }
}
