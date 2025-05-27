@extends('layouts.dosen')

@section('content')
<div class="min-h-screen w-full bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-white p-8">
    <!-- Header Section -->
    <div class="mb-10">
        <div class="flex items-center gap-4 mb-6">
            <div class="w-14 h-14 bg-gradient-to-br from-pink-500 to-pink-600 rounded-2xl flex items-center justify-center shadow-xl shadow-pink-500/25 transform rotate-3 hover:rotate-0 transition-transform duration-300">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            <div>
                <h1 class="text-4xl font-bold bg-gradient-to-r from-pink-300 via-pink-400 to-rose-400 bg-clip-text text-transparent leading-tight">
                    Data Nilai Mahasiswa
                </h1>
                <p class="text-slate-300 text-lg font-medium mt-2">Kelola nilai mahasiswa dalam sistem</p>
            </div>
        </div>
    </div>

    <!-- Main Content Card -->
    <div class="glass-effect rounded-3xl p-8 shadow-2xl shadow-pink-500/10 border border-pink-500/20 backdrop-blur-xl mb-8">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-2xl font-bold bg-gradient-to-r from-pink-200 to-pink-300 bg-clip-text text-transparent mb-2">
                    Daftar Mata Kuliah
                </h2>
                <p class="text-slate-300 text-sm font-medium">Pilih mata kuliah untuk input nilai</p>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
            <div class="bg-gradient-to-br from-slate-700/50 to-slate-800/50 rounded-2xl p-6 flex items-center gap-4 border border-pink-500/20 hover:border-pink-400/30 transition-all duration-300 hover:scale-105 backdrop-blur-sm">
                <div class="w-14 h-14 bg-gradient-to-br from-pink-500 to-pink-600 rounded-2xl flex items-center justify-center shadow-lg shadow-pink-500/25">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-slate-300 text-sm font-medium">Total Mata Kuliah</p>
                    <p class="text-white text-2xl font-bold">{{ $kelasList->count() }}</p>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="bg-slate-800/50 rounded-2xl overflow-hidden border border-slate-700/50 shadow-xl">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-slate-700/70">
                        <tr>
                            <th class="px-8 py-5 text-left text-xs font-bold text-pink-300 uppercase tracking-wider">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                                    </svg>
                                    No
                                </div>
                            </th>
                            <th class="px-8 py-5 text-left text-xs font-bold text-pink-300 uppercase tracking-wider">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                    Mata Kuliah
                                </div>
                            </th>
                            <th class="px-8 py-5 text-left text-xs font-bold text-pink-300 uppercase tracking-wider">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                    Kelas
                                </div>
                            </th>
                            <th class="px-8 py-5 text-center text-xs font-bold text-pink-300 uppercase tracking-wider">
                                <div class="flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"/>
                                    </svg>
                                    Aksi
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-600/50">
                        @foreach ($kelasList as $item)
                        <tr class="hover:bg-slate-700/30 transition-all duration-300 group">
                            <td class="px-8 py-6 whitespace-nowrap">
                                <div class="w-10 h-10 bg-gradient-to-br from-pink-400 to-pink-600 rounded-xl flex items-center justify-center text-white text-sm font-bold shadow-lg shadow-pink-500/25 group-hover:scale-110 transition-transform duration-300">
                                    {{ $loop->iteration }}
                                </div>
                            </td>
                            <td class="px-8 py-6 whitespace-nowrap">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center text-white shadow-lg">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-white font-semibold text-lg">{{ $item->mata_kuliah->nama ?? '-' }}</p>
                                        <p class="text-slate-400 text-sm font-medium">{{ $item->mata_kuliah->kode ?? '' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-6 whitespace-nowrap">
                                <div class="flex items-center gap-2">
                                    <span class="text-white font-semibold text-lg bg-slate-700/50 px-4 py-2 rounded-xl">{{ $item->kode_kelas ?? '-' }}</span>
                                </div>
                            </td>
                            <td class="px-8 py-6 whitespace-nowrap text-center">
                                <a href="{{ route('dosen.khs.create', ['kelas_id' => $item?->id_kelas]) }}" 
                                   class="group/btn bg-gradient-to-r from-pink-500 to-pink-600 hover:from-pink-600 hover:to-pink-700 text-white px-6 py-3 rounded-xl text-sm font-semibold transition-all duration-300 hover:scale-105 flex items-center gap-2 mx-auto w-fit shadow-lg shadow-pink-500/25">
                                    <svg class="w-5 h-5 group-hover/btn:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                    Input Nilai
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection