<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('dashboard.pages.users', compact('users'));
    }

    public function create()
    {
        $users = User::all();
        return view('dashboard.pages.editusers', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'username'  => ['required', 'unique:users,username'],
                'password'  => ['required'],
                'name'      => ['required'],
                'no_hp'     => ['digits_between:10,13'],
                'email'     => ['required', 'email', 'unique:users,email'],
                'foto'      => ['image', 'max:1024']
            ],
            [
                'username.required' => 'Mohon masukkan field username'
            ]
        );

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $path = 'public/foto/' . $request->get('name') . '/';
            $store = $foto->storeAs($path, $foto->getClientOriginalName());
            $link = $request->root() . '/storage/foto/' . $request->get('name') . '/' . $foto->getClientOriginalName();
            $foto = Storage::url($store);
            $foto = $request->root() . $foto;
        }

        User::create(
            [
                'username'  => $request->get('username'),
                'password'  => bcrypt($request->get('password')),
                'name'      => $request->get('name'),
                'no_hp'     => $request->get('no_hp'),
                'role'      => 2,
                'jabatan'   => 'Pegawai',
                'email'     => $request->get('email'),
                'foto'      => $link
            ]
        );

        return redirect()->route('users.index');
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        return redirect()->route('user.index');
    }
}
