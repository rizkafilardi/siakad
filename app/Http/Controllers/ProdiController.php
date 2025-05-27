<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $fakultas = Fakultas::all();
        $prodi = Prodi::with('fakultas')->get();
        return view('admin.prodi.index', compact('prodi', 'fakultas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $fakultas = Fakultas::all();
        return view('admin.prodi.create', compact('fakultas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validated = $request->validate([
            'nama' => 'required',
            'fakultas_id' => 'required|exists:fakultas,id_fakultas',
        ]);
        Prodi::create($validated);
        return redirect()->route('admin.prodi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        return Prodi::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $prodi = Prodi::findOrFail($id);
        $fakultas = Fakultas::all();
        return view('admin.prodi.edit', compact('prodi', 'fakultas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $prodi = Prodi::findOrFail($id);
        $validated = $request->validate([
            'nama' => 'required',
            'fakultas_id' => 'required|exists:fakultas,id_fakultas',
        ]);
        $prodi->update($validated);
        return redirect()->route('admin.prodi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $prodi = Prodi::findOrFail($id);
        $prodi->delete();
        return redirect()->route('admin.prodi.index');
    }
}
