@extends('layouts.dosen')

@section('content')
<div class="min-h-screen p-8">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex items-center gap-4 mb-4">
            <div class="w-12 h-12 bg-gradient-to-br from-pink-500 to-pink-600 rounded-lg flex items-center justify-center shadow-lg shadow-pink-500/25">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
            </div>
            <div>
                <h1 class="text-3xl font-playfair font-bold bg-gradient-to-r from-pink-300 via-pink-400 to-pink-500 bg-clip-text text-transparent">
                    Tambah Absensi
                </h1>
                <p class="text-slate-400">Input kehadiran mahasiswa untuk kelas {{ $kelas->kode_kelas }} - {{ $kelas->mata_kuliah->nama }}</p>
            </div>
        </div>
    </div>

    <!-- Form Card -->
    <div class="glass-effect rounded-2xl p-8 shadow-xl shadow-pink-500/10 border border-pink-500/20">
        <form action="{{ route("dosen.absensi.store") }}" method="POST">
            @csrf
            
            <!-- Class Info Header -->
            <div class="mb-8 p-6 bg-gradient-to-r from-pink-500/10 to-pink-600/10 rounded-xl border border-pink-500/20">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-pink-500 to-pink-600 rounded-full flex items-center justify-center shadow-lg shadow-pink-500/25">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-playfair font-bold text-pink-300">{{ $kelas->kode_kelas }}</h2>
                        <p class="text-white font-medium">{{ $kelas->mata_kuliah->nama }}</p>
                        <p class="text-slate-400 text-sm">{{ count($krs) }} Mahasiswa Terdaftar</p>
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <div class="bg-slate-800/50 rounded-xl overflow-hidden border border-slate-700/50 mb-8">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-slate-700/70">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-medium text-pink-300 uppercase tracking-wider">No</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-pink-300 uppercase tracking-wider">Nama Mahasiswa</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-pink-300 uppercase tracking-wider">NIM</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-pink-300 uppercase tracking-wider">Tanggal</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-pink-300 uppercase tracking-wider">Status Kehadiran</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-600/50">
                            @foreach ($krs as $k)
                            <tr class="hover:bg-slate-700/30 transition-all duration-300">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="w-8 h-8 bg-gradient-to-br from-pink-400 to-pink-600 rounded-full flex items-center justify-center text-white text-sm font-bold">
                                        {{ $loop->iteration }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full flex items-center justify-center text-white text-sm font-bold">
                                            {{ substr($k->mahasiswa->nama ?? 'M', 0, 1) }}
                                        </div>
                                        <div>
                                            <p class="text-white font-medium">{{ $k->mahasiswa->nama ?? '-' }}</p>
                                            <p class="text-slate-400 text-sm">Mahasiswa</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-white font-mono bg-slate-700/50 px-3 py-1 rounded-lg inline-block">
                                        {{ $k->mahasiswa->nim ?? '-' }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <input type="hidden" name="krs_id[]" value="{{ $k->id_krs }}">
                                    <input type="date" name="tanggal[]" value="{{ date('Y-m-d') }}" 
                                           class="glass-effect border border-pink-500/30 rounded-lg px-4 py-2 text-white bg-slate-800/50 focus:border-pink-400 focus:ring-2 focus:ring-pink-400/20 transition-all duration-300" required>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <select name="status[]" 
                                            class="glass-effect border border-pink-500/30 rounded-lg px-4 py-2 text-white bg-slate-800/50 focus:border-pink-400 focus:ring-2 focus:ring-pink-400/20 transition-all duration-300 min-w-[150px]" required>
                                        <option value="" class="bg-slate-800">Pilih Status Kehadiran</option>
                                        <option value="hadir" class="bg-slate-800">✅ Hadir</option>
                                        <option value="izin" class="bg-slate-800">📝 Izin</option>
                                        <option value="sakit" class="bg-slate-800">🏥 Sakit</option>
                                        <option value="alpha" class="bg-slate-800">❌ Alpha</option>
                                    </select>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center">
                <button type="submit" 
                        class="group inline-flex items-center gap-3 bg-gradient-to-r from-pink-500 to-pink-600 hover:from-pink-600 hover:to-pink-700 text-white font-bold px-8 py-4 rounded-xl transition-all duration-300 hover:scale-105 shadow-lg shadow-pink-500/25 text-lg">
                    <svg class="w-6 h-6 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Simpan Absensi
                </button>
            </div>
        </form>
    </div>
</div>
@endsection