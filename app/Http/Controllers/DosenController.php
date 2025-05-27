<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\User;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $dosen = Dosen::with('user')->get();
        return view('admin.dosen.index', compact('dosen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $users = User::all();
        return view('admin.dosen.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validated = $request->validate([
            'username' => 'required|unique:users,username',
            'nama' => 'required',
            'nip' => 'required|unique:dosen,nip',
            'bidang_keahlian' => 'required',
        ]);

        $user = User::create([
            'username' => $validated['username'],
            'password' => $validated['username'],
            'role' => 'dosen',
        ]);

        Dosen::create([
            'user_id' => $user->id_user,
            'nama' => $validated['nama'],
            'nip' => $validated['nip'],
            'bidang_keahlian' => $validated['bidang_keahlian'],
        ]); 

        return redirect()->route('admin.dosen.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        return Dosen::with('user')->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $dosen = Dosen::findOrFail($id);
        return view('admin.dosen.edit', compact('dosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $dosen = Dosen::with('user')->findOrFail($id);

        $request->validate([
            'username' => 'required|unique:users,username,'. $dosen->user->id_user . ',id_user',
            'nama' => 'required',
            'nip' => 'required',
            'bidang_keahlian' => 'required',
        ]);


        // Update tabel `users`
        $dosen->user->update([
            'username' => $request->username,
        ]);

        // Update tabel `mahasiswa`
        $dosen->update([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'bidang_keahlian' => $request->bidang_keahlian,
        ]);

        return redirect()->route('admin.dosen.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $dosen = Dosen::findOrFail($id);
        $user = User::findOrFail($dosen->user_id);
        $dosen->delete();
        $user->delete();
        return redirect()->route('admin.dosen.index');
    }
}
