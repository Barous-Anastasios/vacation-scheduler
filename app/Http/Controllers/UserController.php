<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.create_user');
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|alpha|between:1,25',
            'last_name' => 'required|alpha|between:1,25',
            'email' => 'required|email|unique:users',
            'password' => 'required|between:6,100',
            'role_id' => 'required|integer'
        ]);

        User::create($data);

        return redirect('/admin')->with(['message'=>'User was created successfully']);
    }

    public function edit($userId)
    {
        $user = User::find($userId);
        return view('admin.edit_user', compact('user'));
    }

    public function update($userId)
    {
        $data = request()->validate([
            'first_name' => 'required|alpha|between:1,25',
            'last_name' => 'required|alpha|between:1,25',
            'email' => 'required|email',
            'role_id' => 'required|integer'
        ]);

        $user = User::find($userId);

        $user->update($data);

        return redirect('/admin')->with(['message'=>'User was edited successfully']);
    }
}
