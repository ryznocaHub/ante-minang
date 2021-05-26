<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $cek = User::where('email', $request->email)->first();

        if (!$cek) {
            return redirect()->back()->with('login', 'Akun tidak terdaftar');
        }

        $cek = User::where('email', $cek->email)->whereIn('jabatan', ['Pegawai', 'Superadmin'])->get();

        if ($cek->isEmpty()) {
            return redirect()->back()->with('login', 'Akun sudah  tidak aktif');
        }

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->back()->withErrors(['login' => 'Akun tidak terdaftar']);
        }

        $user = User::where('email', $request->email)->first();
        Auth::login($user);

        return redirect()->route('home');
    }

    public function index()
    {
        $users = User::where('role', 2)->get();
        return view('dashboard.pages.users', compact('users'));
    }

    public function create()
    {
        $users = User::where('role', 2)->get();
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

        return redirect()->route('users.index')->with('toast_success', 'Sukses menambah user ' . $request->get('username'));
    }

    public function update(Request $request)
    {
        $request->validate(
            [
                'passwordedit'  => ['nullable'],
                'nameedit'      => ['required'],
                'no_hpedit'     => ['digits_between:10,13'],
                'emailedit'     => ['required', 'email', 'unique:users,email,' . $request->id],
                'statusedit'    => ['required', 'in:Pegawai,Resign']
            ],
            [
                'name.required'     => 'Mohon masukkan field nama lengkap',
                'no_hp.digits_between' => 'Mohon masukkan nomor hp 10 - 13 angka',
                'no_hp.required'    => 'Mohon masukkan field nomor hp',
                'email.required'    => 'Mohon masukkan field email',
                'email.email'       => 'Masukkan format email dengan benar',
                'email.unique'      => 'Email telah digunakan',
            ]
        );

        User::where('id', $request->id)->update(
            [
                'name'      => $request->get('nameedit'),
                'no_hp'     => $request->get('no_hpedit'),
                'jabatan'   => $request->get('statusedit'),
                'email'     => $request->get('emailedit'),
                'foto'      => $request->oldfoto
            ]
        );

        if ($request->has('passwordedit')) {
            User::where('id', $request->id)->update(
                [
                    'password'  => bcrypt($request->passwordedit)
                ]
            );
        }

        return redirect()->route('users.index')->with('toast_success', 'Sukses merubah user ' . $request->get('nameedit'));
    }

    public function destroy(Request $request)
    {
        User::where('id', $request->get('id'))->delete();

        return redirect()->route('users.index')->with('toast_success', 'Sukses menghapus user');
    }

    public function getDataUser(Request $request)
    {
        $dataUser = User::where('id', $request->id)->first();
        return response()->json($dataUser);
    }
}
