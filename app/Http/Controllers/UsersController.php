<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Enums\UserType;

class UsersController extends Controller
{
    private function getRoleName($users)
    {
        foreach ($users as $user) {
            if ($user->role == UserType::Developer) {
                $user->role = "開発者(権限：" . $user->role . ")";
            } elseif ($user->role == UserType::Admin) {
                $user->role = "管理人(権限：" . $user->role . ")";
            } else {
                $user->role = "一般ユーザー(権限：" . $user->role . ")";
            }
        }

        return $users;
    }

    public function getIndex()
    {
        $query = \App\User::query();
        $users = $query->orderBy('role', 'asc')->orderBy('id', 'asc')->paginate(10);

        $users = $this->getRoleName($users);

        return view('users.list', compact('users'));
    }

    public function newIndex()
    {
        return view('users.new_index');
    }

    public function newConfirm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required',
        ]);

        $user = new \App\User($request->all());
        return view('users.new_confirm', compact('user'));
    }

    public function newFinish(Request $request)
    {
        $user = new \App\User;
        $user->id = rand(00000001, 99999999);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        return view('users.new_finish');
    }
}
