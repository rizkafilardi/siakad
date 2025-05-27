<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Dosen;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\KRS;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $dosenId = auth()->user()->dosen->id_dosen;

        $krs = KRS::with('jadwal.kelas.mata_kuliah')
            ->whereHas('jadwal.kelas.mata_kuliah', function ($query) use ($dosenId) {
                $query->where('dosen_pengampu_1_id', $dosenId)
                    ->orWhere('dosen_pengampu_2_id', $dosenId)
                    ->orWhere('dosen_pengampu_3_id', $dosenId);
            })
            ->get()
            ->unique(function ($item) {
                return $item->jadwal->kelas->id_kelas . '-' . $item->jadwal->kelas->mata_kuliah->id_mata_kuliah;
            });

        return view('dosen.absensi.index', compact('krs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request) {
        $kelas = Kelas::findOrFail($request->kelas_id);

        $krs = KRS::with(['mahasiswa', 'jadwal.kelas'])
            ->whereHas('jadwal.kelas', function ($query) use ($kelas) {
                $query->where('id_kelas', $kelas->id_kelas);
            })
            ->get();
        return view('dosen.absensi.create', compact('krs','kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $krsIds = $request->input('krs_id');
        $tanggalList = $request->input('tanggal');
        $statusList = $request->input('status');

        // Validasi semua baris
        foreach ($krsIds as $index => $krsId) {
            $tanggal = $tanggalList[$index];
            $status = $statusList[$index];

            // Validasi sederhana
            if (!$tanggal || !$status) {
                continue;
            }

            Absensi::create([
                'krs_id' => $krsId,
                'tanggal' => $tanggal,
                'status' => $status,
            ]);
        }

        return redirect()->route('dosen.absensi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        return Absensi::with('krs')->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($kelas_id) {

        $krsList = KRS::with(['mahasiswa', 'jadwal.kelas', 'absensi'])
        ->whereHas('jadwal.kelas', function ($query) use ($kelas_id) {
            $query->where('id_kelas', $kelas_id);
        })
        ->get();

        foreach ($krsList as $krs) {
            $lastAbsensi = $krs->absensi->sortByDesc('tanggal')->first();
            $krs->last_status = $lastAbsensi->status ?? 'alpha';
        }

        return view('dosen.absensi.edit', compact('krsList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request) {
        $krs_ids = $request->input('krs_id');
        $tanggal = $request->input('tanggal');
        $status = $request->input('status');

        foreach ($krs_ids as $index => $krs_id) {
            Absensi::updateOrCreate(
                [
                    'krs_id' => $krs_id,
                    'tanggal' => $tanggal[$index]
                ],
                [
                    'status' => $status[$index]
                ]
            );
        }

        return redirect()->route('dosen.absensi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        return Absensi::destroy($id);
    }
}
