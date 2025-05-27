<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $prodi = Prodi::all()->count();
        $mahasiswa = Mahasiswa::with('user', 'prodi')->get();
        return view('admin.mahasiswa.index', compact('mahasiswa', 'prodi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $prodi = Prodi::all();
        // $kelas = Kelas::all();
        $users = User::all();
        return view('admin.mahasiswa.create', compact('prodi', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validated = $request->validate([
            'username' => 'required|unique:users,username',
            'nama' => 'required',
            'nim' => 'required|unique:mahasiswa,nim',
            'angkatan' => 'required',
            'prodi_id' => 'required|exists:prodi,id_prodi',
        ]);

        $user = User::create([
            'username' => $validated['username'],
            'password' => $validated['username'],
            'role' => 'mahasiswa',
        ]);

        Mahasiswa::create([
            'user_id' => $user->id_user,
            'nama' => $validated['nama'],
            'nim' => $validated['nim'],
            'angkatan' => $validated['angkatan'],
            'prodi_id' => $validated['prodi_id'],
        ]);

        return redirect()->route('admin.mahasiswa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        return Mahasiswa::with('user', 'prodi')->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $mahasiswa = Mahasiswa::with('user', 'prodi')->findOrFail($id);
        $prodis = Prodi::all();
        // $kelas = Kelas::all();
        return view('admin.mahasiswa.edit', compact('mahasiswa', 'prodis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $mhs = Mahasiswa::with('user')->findOrFail($id);
        $validated = $request->validate([
            'username' => 'required|unique:users,username,' . $mhs->user->id_user . ',id_user',
            'nama' => 'required',
            'nim' => 'required',
            'angkatan' => 'required',
            'prodi_id' => 'required|exists:prodi,id_prodi',
        ]);


        // Update tabel `users`
        $mhs->user->update([
            'username' => $request->username,
        ]);

        // Update tabel `mahasiswa`
        $mhs->update($validated);

        return redirect()->route('admin.mahasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $mhs = Mahasiswa::findOrFail($id);
        $user = User::findOrFail($mhs->user_id);
        $mhs->delete();
        $user->delete();
        return redirect()->route('admin.mahasiswa.index');
    }
}
