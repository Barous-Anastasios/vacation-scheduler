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
        $data = $this->validateData($request);
        User::create($data);

        return redirect('/home');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    protected function validateData($request)
    {
        return $request->validate([
            'name' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role_id' => 'required'
        ]);
    }

    public function edit($userId)
    {
        $user = User::find($userId);
        return view('admin.edit_user', compact('user'));
    }

    public function update(Request $request)
    {
        $data = $this->validateData($request);

        $user = User::find($request->id);

        $user->update($data);

        return redirect('/home');
    }
}
