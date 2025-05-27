@extends('layouts.mahasiswa')

@section('content')
<div class="min-h-screen w-full bg-slate-900 text-white p-6">
    <!-- Header Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-white mb-2">Nilai Saya</h1>
        <p class="text-slate-400">Kartu Hasil Studi - Prestasi Akademik</p>
    </div>

    <!-- Main Content Card -->
    <div class="bg-slate-800 rounded-xl p-6 mb-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-xl font-semibold text-white mb-1">Kartu Hasil Studi</h2>
                <p class="text-slate-400 text-sm">Hasil nilai semester ini</p>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
            <div class="bg-slate-700 rounded-lg p-4 flex items-center gap-3">
                <div class="w-10 h-10 bg-red-500 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-slate-400 text-sm">Total Mata Kuliah</p>
                    <p class="text-white text-xl font-bold">{{ count($khs) }}</p>
                </div>
            </div>

            <div class="bg-slate-700 rounded-lg p-4 flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                </div>
                <div>
                    <p class="text-slate-400 text-sm">IPK Semester</p>
                    <p class="text-white text-xl font-bold">3.75</p>
                </div>
            </div>

            <div class="bg-slate-700 rounded-lg p-4 flex items-center gap-3">
                <div class="w-10 h-10 bg-purple-500 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                    </svg>
                </div>
                <div>
                    <p class="text-slate-400 text-sm">Total SKS</p>
                    <p class="text-white text-xl font-bold">24</p>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="bg-slate-700 rounded-lg overflow-hidden">
            @forelse ($khs as $item)
                @if($loop->first)
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-slate-600">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-medium text-slate-300 uppercase tracking-wider">Mata Kuliah</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-slate-300 uppercase tracking-wider">Kelas</th>
                                <th class="px-6 py-4 text-center text-xs font-medium text-slate-300 uppercase tracking-wider">Nilai</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-600">
                @endif
                
                <tr class="hover:bg-slate-600 transition-colors duration-200">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center gap-3">
                            
                            <div>
                                <p class="text-white font-medium">{{ $item->krs->jadwal->kelas->mata_kuliah->nama ?? '-' }}</p>
                                <p class="text-slate-400 text-sm">Semester {{ $item->krs->jadwal->kelas->mata_kuliah->semester ?? '-' }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 rounded flex items-center justify-center text-white text-xs font-bold">
                                <span>{{ $item->krs->jadwal->kelas->kode_kelas}}</span>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        @php
                            $nilai = $item->nilai;
                            $gradeClass = '';
                            if($nilai >= 85) {
                                $gradeColor = 'bg-green-100 text-green-800';
                            } elseif($nilai >= 70) {
                                $gradeColor = 'bg-blue-100 text-blue-800';
                            } elseif($nilai >= 60) {
                                $gradeColor = 'bg-yellow-100 text-yellow-800';
                            } elseif($nilai >= 50) {
                                $gradeColor = 'bg-red-100 text-red-800';
                            } else {
                                $gradeColor = 'bg-gray-100 text-gray-800';
                            }
                        @endphp
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $gradeColor }}">
                            {{ $nilai }}
                        </span>
                    </td>
                </tr>
                
                @if($loop->last)
                        </tbody>
                    </table>
                </div>
                @endif
            @empty
                <!-- Empty State -->
                <div class="p-12 text-center">
                    <div class="w-16 h-16 bg-red-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-2">Belum Ada Nilai</h3>
                    <p class="text-slate-400 mb-4">Nilai untuk semester ini belum tersedia.</p>
                    <div class="flex items-center justify-center gap-2 text-red-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-sm font-medium">Tunggu pengumuman dari dosen</span>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    @if(count($khs) > 0)
    <!-- Grade Legend -->
    <div class="bg-slate-800 rounded-xl p-6">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-6 h-6 bg-yellow-500 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-white">Keterangan Nilai</h3>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
            <div class="flex items-center gap-3">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">A</span>
                <span class="text-slate-400 text-sm">85 - 100</span>
            </div>
            <div class="flex items-center gap-3">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">B</span>
                <span class="text-slate-400 text-sm">70 - 84</span>
            </div>
            <div class="flex items-center gap-3">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">C</span>
                <span class="text-slate-400 text-sm">60 - 69</span>
            </div>
            <div class="flex items-center gap-3">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">D</span>
                <span class="text-slate-400 text-sm">50 - 59</span>
            </div>
            <div class="flex items-center gap-3">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">E</span>
                <span class="text-slate-400 text-sm">< 50</span>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection