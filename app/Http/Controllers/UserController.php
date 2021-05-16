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
                'no_hp'     => ['digits_between:10,13', 'required'],
                'email'     => ['required', 'email', 'unique:users,email'],
                'foto'      => ['image', 'max:1024', 'required']
            ],
            [
                'username.required' => 'Mohon masukkan field username',
                'username.unique'   => 'Username telah digunakan',
                'password.required' => 'Mohon masukkan field password',
                'name.required'     => 'Mohon masukkan field nama lengkap',
                'no_hp.digits_between' => 'Mohon masukkan nomor hp 10 - 13 angka',
                'no_hp.required'    => 'Mohon masukkan field nomor hp',
                'email.requierd'    => 'Mohon masukkan field email',
                'email.email'       => 'Masukkan format email dengan benar',
                'email.unique'      => 'Email telah digunakan',
                'foto.image'        => 'Masukkan file dengan type gambar',
                'foto.max'          => 'Maksimum file 1024 KB',
                'foto.required'     => 'Mohon masukkan foto'
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
        $request->validate(
            [
                'username'  => ['required', 'unique:users,username,' . $id],
                'password'  => ['required'],
                'name'      => ['required'],
                'no_hp'     => ['digits_between:10,13'],
                'email'     => ['required', 'email', 'unique:users,email,' . $id],
                'foto'      => ['image', 'max:1024'],
                'status'    => ['required', 'in:Pegawai,Resign']
            ],
            [
                'username.required' => 'Mohon masukkan field username',
                'username.unique'   => 'Username telah digunakan',
                'password.required' => 'Mohon masukkan field password',
                'name.required'     => 'Mohon masukkan field nama lengkap',
                'no_hp.digits_between' => 'Mohon masukkan nomor hp 10 - 13 angka',
                'no_hp.required'    => 'Mohon masukkan field nomor hp',
                'email.requierd'    => 'Mohon masukkan field email',
                'email.email'       => 'Masukkan format email dengan benar',
                'email.unique'      => 'Email telah digunakan',
                'foto.image'        => 'Masukkan file dengan type gambar',
                'foto.max'          => 'Maksimum file 1024 KB',
                'foto.required'     => 'Mohon masukkan foto'
            ]
        );

        $link = '';

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $path = 'public/foto/' . $request->get('name') . '/';
            $store = $foto->storeAs($path, $foto->getClientOriginalName());
            $link = $request->root() . '/storage/foto/' . $request->get('name') . '/' . $foto->getClientOriginalName();
            $foto = Storage::url($store);
            $foto = $request->root() . $foto;
        } else {
            $link = $request->oldfoto;
        }

        User::where('id', $id)->update(
            [
                'username'  => $request->get('username'),
                'password'  => bcrypt($request->get('password')),
                'name'      => $request->get('name'),
                'no_hp'     => $request->get('no_hp'),
                'jabatan'   => $request->get('status'),
                'email'     => $request->get('email'),
                'foto'      => $link
            ]
        );

        return redirect()->route('user.index')->with('status', 'Sukses mengubah user');
    }

    public function destroy(Request $request, $id)
    {
        User::where('id', $request->id)->delete();

        return redirect()->route('user.index')->with('status', 'Sukses menghapus user');
    }
}
