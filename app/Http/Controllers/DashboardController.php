<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Kelas;
use App\Models\MataKuliah;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user->role === 'admin') {
            $mahasiswaCount = User::where('role', 'mahasiswa')->count();
            $dosenCount = User::where('role', 'dosen')->count();
            $mata_kuliahCount = MataKuliah::count(); 
            $kelasCount = Kelas::count();
            $prodiCount = Prodi::count();
            $fakultasCount = Fakultas::count();
            return view('admin.dashboard', compact('user', 'mahasiswaCount', 'dosenCount', 'mata_kuliahCount', 'kelasCount', 'prodiCount', 'fakultasCount'));
        } elseif ($user->role === 'mahasiswa') {
            return view('mahasiswa.dashboard', compact('user'));
        } elseif ($user->role === 'dosen') {
            return view('dosen.dashboard', compact('user'));
        } else {
            auth()->logout();
            return redirect()->route('auth.login');
        }
    }
}