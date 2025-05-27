<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->role === 'admin') {
            return view('admin.profile.show', compact('user'));
        } elseif ($user->role === 'dosen') {
            return view('dosen.profile.show', compact('user'));
        } elseif ($user->role === 'mahasiswa') {
            return view('mahasiswa.profile.show', compact('user'));
        }
        abort(403, 'Akses ditolak.');
    }

    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        if ($user->role === 'admin') {
            return view('admin.profile.edit', compact('user'));
        } elseif ($user->role === 'dosen') {
            return view('dosen.profile.edit', compact('user'));
        } elseif ($user->role === 'mahasiswa') {
            return view('mahasiswa.profile.edit', compact('user'));
        }else{
            abort(403, 'Akses ditolak.');
        }
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id_user . ',id_user',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id_user . ',id_user',
            'current_password' => 'nullable|string',
            'new_password' => 'nullable|string|min:8|confirmed', // pastikan kamu punya field `new_password_confirmation`
        ]);

        // Update username and email
        $user->username = $request->username;
        $user->email = $request->email;

        // Cek jika user ingin mengganti password
        if ($request->filled('current_password') && $request->filled('new_password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Password saat ini tidak sesuai.']);
            }

            $user->password = Hash::make($request->new_password);
        }

        $user->save();
        if($user->role === 'admin'){
            return redirect()->route('admin.profile.index');
        }elseif($user->role === 'mahasiswa'){
            return redirect()->route('mahasiswa.profile.index');
        }elseif($user->role === 'dosen'){
            return redirect()->route('dosen.profile.index');
        }else{
            abort(403, 'Akses ditolak');
        }
    }
}
