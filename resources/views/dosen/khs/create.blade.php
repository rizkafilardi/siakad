@extends('layouts.dosen')

@section('content')
<div class="min-h-screen w-full bg-slate-900 text-white p-6">
    <!-- Header Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-white mb-2">Input Nilai Mahasiswa</h1>
        <p class="text-slate-400">Input nilai untuk mata kuliah {{ $kelas->mata_kuliah->nama ?? '' }} - Kelas {{ $kelas->kode_kelas ?? '' }}</p>
    </div>

    <!-- Main Content Card -->
    <div class="bg-slate-800 rounded-xl p-6 mb-6">
        <form action="{{ route('dosen.khs.store') }}" method="POST">
            @csrf
            
            <!-- Class Info Header -->
            <div class="mb-8 p-6 bg-gradient-to-r from-red-500/10 to-red-600/10 rounded-xl border border-red-500/20">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 bg-red-500 rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-white">{{ $kelas->mata_kuliah->nama ?? 'Mata Kuliah' }}</h2>
                        <p class="text-slate-300 font-medium">{{ $kelas->kode_kelas ?? '-' }}</p>
                        <p class="text-slate-400 text-sm">{{ count($krs ?? []) }} Mahasiswa Terdaftar</p>
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <div class="bg-slate-700 rounded-lg overflow-hidden mb-8">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-slate-600">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-medium text-slate-300 uppercase tracking-wider">No</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-slate-300 uppercase tracking-wider">Nama Mahasiswa</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-slate-300 uppercase tracking-wider">NIM</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-slate-300 uppercase tracking-wider">Nilai</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-600">
                            @foreach ($krs as $k)
                            <tr class="hover:bg-slate-600/30 transition-all duration-300">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center text-white text-sm font-bold">
                                        {{ $loop->iteration }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white text-sm font-bold">
                                            {{ substr($k->mahasiswa->nama ?? 'M', 0, 1) }}
                                        </div>
                                        <div>
                                            <p class="text-white font-medium">{{ $k->mahasiswa->nama ?? '-' }}</p>
                                            <p class="text-slate-400 text-sm">Mahasiswa</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-white font-mono bg-slate-600/50 px-3 py-1 rounded-lg inline-block">
                                        {{ $k->mahasiswa->nim ?? '-' }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <input type="hidden" name="krs_id[]" value="{{ $k->id_krs }}">
                                    <select name="nilai[]" 
                                            class="bg-slate-600 border border-slate-500 rounded-lg px-4 py-2 text-white focus:border-red-400 focus:ring-2 focus:ring-red-400/20 transition-all duration-300 min-w-[120px]" required>
                                        <option value="">Pilih Nilai</option>
                                        @foreach (['A', 'B', 'C', 'D', 'E'] as $nilai)
                                            <option value="{{ $nilai }}" {{ ($k->khs->nilai ?? '') === $nilai ? 'selected' : '' }}>
                                                {{ $nilai }}
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
                        class="bg-red-600 hover:bg-red-700 text-white font-bold px-8 py-4 rounded-xl transition-all duration-300 hover:scale-105 flex items-center gap-3 text-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Simpan Nilai
                </button>
            </div>
        </form>
    </div>
</div>
@endsection