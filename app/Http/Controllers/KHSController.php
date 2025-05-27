<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\KHS;
use App\Models\KRS;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KHSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $user = Auth::user();
        if ($user->role === 'dosen') {
            $userId = $user->id_user;
            $dosen = Dosen::where('user_id', $userId)->first();

            $idDosen = $dosen->id_dosen;

            $kelasList = Kelas::with('mata_kuliah')
                ->whereHas('mata_kuliah', function ($query) use ($idDosen) {
                    $query->where('dosen_pengampu_1_id', $idDosen)
                        ->orWhere('dosen_pengampu_2_id', $idDosen)
                        ->orWhere('dosen_pengampu_3_id', $idDosen);
                })
                ->get();

            return view('dosen.khs.index', compact('kelasList'));
        }elseif ($user->role === 'admin') {
            $krs = Jadwal::whereIn('id_jadwal', function ($query) {
            $query->select('jadwal_id')
                    ->from('krs')
                    ->groupBy('jadwal_id');
            })->with('kelas.mata_kuliah')->get();
            return view('dosen.khs.index', compact('krs'));
        }elseif ($user->role === 'mahasiswa') {
           // Ambil user yang sedang login
           $user = Auth::user();
           
           // Ambil data mahasiswa dari user
           $userId = $user->id_user;
           $mahasiswa = Mahasiswa::where('user_id', $userId)->first();
           $idMahasiswa = $mahasiswa->id_mahasiswa;

            // Ambil semua nilai KHS berdasarkan mahasiswa yang login
            $khs = KHS::with(['krs.jadwal', 'krs.jadwal.kelas'])
                ->whereHas('krs', function ($query) use ($idMahasiswa) {
                    $query->where('mahasiswa_id', $idMahasiswa);
                })
                ->get();

            return view('mahasiswa.khs.index', compact('khs'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request) {
        $user = Auth::user();
        $userId = $user->id_user;
        $dosen = Dosen::where('user_id', $userId)->first();
        $idDosen = $dosen->id_dosen;


        $kelas = Kelas::with('mata_kuliah')->findOrFail($request->kelas_id);

        // Validasi apakah dosen adalah pengampu mata kuliah ini
        $mataKuliah = $kelas->mata_kuliah;
        if (
            $mataKuliah->dosen_pengampu_1_id !== $idDosen &&
            $mataKuliah->dosen_pengampu_2_id !== $idDosen &&
            $mataKuliah->dosen_pengampu_3_id !== $idDosen
        ) {
            abort(403, 'Anda tidak berwenang memberikan nilai untuk mata kuliah ini.');
        }

        $krs = KRS::with(['mahasiswa', 'jadwal.kelas', 'khs'])
            ->whereHas('jadwal.kelas', function ($query) use ($kelas) {
                $query->where('id_kelas', $kelas->id_kelas);
            })
            ->get();

        return view('dosen.khs.create', compact('krs', 'kelas'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $user = Auth::user();
        $userId = $user->id_user;
        $dosen = Dosen::where('user_id', $userId)->first();
        $idDosen = $dosen->id_dosen;

        $krsIds = $request->input('krs_id');
        $nilaiList = $request->input('nilai');

        foreach ($krsIds as $index => $krsId) {
            $nilai = $nilaiList[$index];

            if (!$nilai) continue;

            $krs = KRS::with('jadwal.kelas.mata_kuliah')->findOrFail($krsId);

            $mataKuliah = $krs->jadwal->kelas->mata_kuliah;

            // Validasi apakah dosen ini pengampu
            if (
                $mataKuliah->dosen_pengampu_1_id !== $idDosen &&
                $mataKuliah->dosen_pengampu_2_id !== $idDosen &&
                $mataKuliah->dosen_pengampu_3_id !== $idDosen
            ) {
                continue; // atau bisa `abort(403)`
            }

            KHS::updateOrCreate(
                ['krs_id' => $krsId],
                ['nilai' => $nilai]
            );
        }

        return redirect()->route('dosen.khs.index');
}

    /**
     * Display the specified resource.
     */
    public function show($id) {
        return KHS::with('krs')->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        return KHS::destroy($id);
    }
}
