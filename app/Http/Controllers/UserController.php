<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
            'role' => 'required|in:user,admin',
            'phone' => 'required',
            'address' => 'required',
        ]);

        DB::beginTransaction();
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);

            DB::commit();

            return redirect()->route('admin.data-user')->with('success', 'Data User berhasil ditambahkan');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('admin.data-user')->with('error', 'Data User gagal ditambahkan. Error: ' . $th->getMessage());
        }
    }

    public function update(Request $request, User $user)
    {
        $role = ([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:user,admin',
            'password' => 'nullable',
            'phone' => 'required',
            'address' => 'required',
        ]);

        // check if password is changed
        if ($request->password != $user->password) {
            $role['password'] = 'required|confirmed|min:8';
            $password = Hash::make($request->password);
        } else {
            $password = $user->password;
        }

        $request->validate($role);

        DB::beginTransaction();
        try {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $password,
                'role' => $request->role,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);

            DB::commit();

            return redirect()->route('admin.data-user')->with('success', 'Data User berhasil diubah');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('admin.data-user')->with('error', 'Data User gagal diubah. Error: ' . $th->getMessage());
        }
    }

    public function destroy(User $user)
    {
        DB::beginTransaction();
        try {
            $user->delete();

            DB::commit();

            return redirect()->route('admin.data-user')->with('success', 'Data User berhasil dihapus');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('admin.data-user')->with('error', 'Data User gagal dihapus. Error: ' . $th->getMessage());
        }
    }
}
