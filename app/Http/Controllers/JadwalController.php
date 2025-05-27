<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $jadwal = Jadwal::with('kelas')->get();
        return view('admin.jadwal.index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $kelas = Kelas::all();
        $mata_kuliah = MataKuliah::all();
        $dosens = Dosen::all();
        return view('admin.jadwal.create', compact('mata_kuliah', 'dosens', 'kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validated = $request->validate([
        'kelas_id' => 'required|exists:kelas,id_kelas',
        'hari' => 'required',
        'jam_mulai' => 'required',
        'jam_selesai' => 'required',
    ]);

        $kelas = Kelas::find($validated['kelas_id']);
        $validated['jam_mulai'] = date('H:i:s', strtotime($validated['jam_mulai']));
        $validated['jam_selesai'] = date('H:i:s', strtotime($validated['jam_selesai']));

        if (strtotime($validated['jam_selesai']) <= strtotime($validated['jam_mulai'])) {
            return back()->withErrors(['jam_selesai' => 'Jam selesai harus lebih besar dari jam mulai']);
        }
        // dd($validated);
        Jadwal::create([
            'kelas_id' => $validated['kelas_id'],
            'hari' => $validated['hari'],
            'jam_mulai' => $validated['jam_mulai'],
            'jam_selesai' => $validated['jam_selesai'],
            'ruangan' => $kelas->ruangan,
        ]);

        return redirect()->route('admin.jadwal.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        return Jadwal::with('kelas')->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $kelas = Kelas::all();
        $jadwal = Jadwal::findOrFail($id);
        return view('admin.jadwal.edit', compact('jadwal', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($request->all());
        return redirect()->route('admin.jadwal.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();
        return redirect()->route('admin.jadwal.index');
    }
}
