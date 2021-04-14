<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('dashboard.pages.users', compact('users'));
    }

    public function create() {
        $users = User::all();
        return view('dashboard.pages.editusers', compact('users'));
    }

    public function store(Request $request) {
        $request->validate(
            [
                'username'  => ['required', 'unique:users,username'],
                'password'  => ['required'],
                'name'      => ['required'],
                'email'     => ['required', 'email', 'unique:users,email'],
                'foto'      => ['image', 'max:1024']
            ],
            [
                'username.required' => 'Mohon masukkan field username'
            ]
        );

        return redirect()->route('user.index');
    }

    public function update(Request $request, $id) {
        return redirect()->route('user.index');
    }

    public function destroy($id) {
        return redirect()->route('user.index');
    }
}
