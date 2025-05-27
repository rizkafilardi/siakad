<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $users = User::with('dosen', 'mahasiswa')->get();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
        'username' => 'required',
        'password' => 'required|min:6',
    ]);

    User::create([
        'username' => $request->username,
        'password' => Hash::make($request->password),
        'role' => $request->role
    ]);
        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        return User::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $user = User::findOrFail($id);
        return view('admin.user.show', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->update($request->only('username', 'role'));
        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.user.index');
    }   
}
