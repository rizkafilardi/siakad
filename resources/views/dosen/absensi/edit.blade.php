@extends('layouts.dosen')

@section('content')
<div class="min-h-screen p-8">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex items-center gap-4 mb-4">
            <div class="w-12 h-12 bg-gradient-to-br from-pink-500 to-pink-600 rounded-lg flex items-center justify-center shadow-lg shadow-pink-500/25">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
            </div>
            <div>
                <h1 class="text-3xl font-playfair font-bold bg-gradient-to-r from-pink-300 via-pink-400 to-pink-500 bg-clip-text text-transparent">
                    Edit Absensi
                </h1>
                <p class="text-slate-400">Perbarui data kehadiran mahasiswa</p>
            </div>
        </div>
    </div>

    <!-- Form Card -->
    <div class="glass-effect rounded-2xl p-8 shadow-xl shadow-pink-500/10 border border-pink-500/20">
        <form action="{{ route("dosen.absensi.update") }}" method="POST">
            @csrf
            @method('PUT')
            
            <!-- Info Alert -->
            <div class="mb-8 p-4 bg-gradient-to-r from-blue-500/10 to-blue-600/10 rounded-xl border border-blue-500/20">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-blue-300 font-medium">Mode Edit Absensi</p>
                        <p class="text-slate-400 text-sm">Anda dapat mengubah status kehadiran dan tanggal absensi mahasiswa</p>
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
                            @foreach ($krsList as $krs)
                            <tr class="hover:bg-slate-700/30 transition-all duration-300">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="w-8 h-8 bg-gradient-to-br from-pink-400 to-pink-600 rounded-full flex items-center justify-center text-white text-sm font-bold">
                                        {{ $loop->iteration }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-purple-700 rounded-full flex items-center justify-center text-white text-sm font-bold">
                                            {{ substr($krs->mahasiswa->nama ?? 'M', 0, 1) }}
                                        </div>
                                        <div>
                                            <p class="text-white font-medium">{{ $krs->mahasiswa->nama ?? '-' }}</p>
                                            <p class="text-slate-400 text-sm">Mahasiswa</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-white font-mono bg-slate-700/50 px-3 py-1 rounded-lg inline-block">
                                        {{ $krs->mahasiswa->nim ?? '-' }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <input type="hidden" name="krs_id[]" value="{{ $krs->id_krs }}">
                                    <input type="date" name="tanggal[]" value="{{ date('Y-m-d') }}" 
                                           class="glass-effect border border-pink-500/30 rounded-lg px-4 py-2 text-white bg-slate-800/50 focus:border-pink-400 focus:ring-2 focus:ring-pink-400/20 transition-all duration-300" required>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <select name="status[]" 
                                            class="glass-effect border border-pink-500/30 rounded-lg px-4 py-2 text-white bg-slate-800/50 focus:border-pink-400 focus:ring-2 focus:ring-pink-400/20 transition-all duration-300 min-w-[150px]" required>
                                        @foreach (['hadir', 'izin', 'sakit', 'alpha'] as $status)
                                            <option value="{{ $status }}" {{ $status == $krs->last_status ? 'selected' : '' }} class="bg-slate-800">
                                                @if($status == 'hadir') ✅ Hadir
                                                @elseif($status == 'izin') 📝 Izin
                                                @elseif($status == 'sakit') 🏥 Sakit
                                                @elseif($status == 'alpha') ❌ Alpha
                                                @endif
                                            </option>
                                        @endforeach
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
                    Update Absensi
                </button>
            </div>
        </form>
    </div>
</div>
@endsection