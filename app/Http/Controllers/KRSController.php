<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\KRS;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class KRSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $user = Auth::user();
        $user = auth()->user();
        if($user->role === 'admin') {
            $krs = KRS::with(['mahasiswa', 'jadwal'])->get();
            return view('admin.krs.index', compact('krs'));
        }elseif($user->role === 'mahasiswa') {

            // Ambil data mahasiswa dari user
            $mahasiswa = Mahasiswa::where('user_id', $user->id_user)->firstOrFail();
            if (!$mahasiswa) {
                return redirect()->back()->with('error', 'Data mahasiswa tidak ditemukan. Silakan hubungi admin.');
            }

            // Ambil semua nilai KHS berdasarkan mahasiswa yang login
            $krs = KRS::with(['mahasiswa', 'jadwal.kelas'])
                ->where('mahasiswa_id', $mahasiswa->id_mahasiswa)
                ->get();

            return view('mahasiswa.krs.index', compact('krs'));
        }else{
            abort(403, 'Akses ditolak.');
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        // dd(auth()->user()->id);
        $jadwal = Jadwal::with(['kelas'])->get();

        return view('mahasiswa.krs.create', compact(  'jadwal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {

        // dd($request->all());
        $validated = $request->validate([
            'jadwal_id' => 'required|exists:jadwal,id_jadwal',
        ]);
        $user = auth()->user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id_user)->first();
        
        if (!$mahasiswa) {
            return back()->with('error', 'Data mahasiswa tidak ditemukan.');
        }
        $jadwal = Jadwal::find($validated['jadwal_id']);
        $existing = KRS::where('mahasiswa_id', $mahasiswa->id_mahasiswa)
            ->where('jadwal_id', $jadwal->id_jadwal)
            ->first();

        if ($existing) {
            return back()->with('error', 'Mata kuliah ini sudah ditambahkan ke KRS.');
        }
        $sudahAmbil = KRS::where('mahasiswa_id', $mahasiswa->id_mahasiswa)
        ->whereHas('jadwal.kelas', function ($query) use ($jadwal) {
            $query->where('mata_kuliah_id', $jadwal->kelas->mata_kuliah_id ?? null);
        })
        ->exists();

        if ($sudahAmbil) {
            return back()->with('error', 'Kamu sudah mengambil mata kuliah ini di kelas lain.');
        }
        
        KRS::create([
            'mahasiswa_id' => $mahasiswa->id_mahasiswa,
            'jadwal_id' => $jadwal->id_jadwal,
            'tahun_ajaran' => "2023/2024",
            'semester' => $jadwal->kelas->mata_kuliah->semester,
        ]);

        return redirect()->route('mahasiswa.krs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        return KRS::with(['mahasiswa', 'kelas'])->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $krs = Krs::findOrFail($id);
        $mahasiswa = Mahasiswa::all();
        $matakuliahs = MataKuliah::all();
        return view('krs.edit', compact('krs', 'mahasiswa', 'matakuliahs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $krs = KRS::findOrFail($id);
        $krs->update($request->all());
        return $krs;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $krs = KRS::findOrFail($id);
        $krs->delete();
        $user = Auth::user();
        if($user->role  === 'admin'){
            return redirect()->route('admin.krs.index');
        }elseif($user->role === 'mahasiswa'){
            return redirect()->route('mahasiswa.krs.index');
        }
    }
}
