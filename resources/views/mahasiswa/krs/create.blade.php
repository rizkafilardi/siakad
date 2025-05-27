@extends('layouts.mahasiswa')

@section('content')
<div class="min-h-screen w-full bg-slate-900 text-white p-6">
    <!-- Header Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-white mb-2">Tambah KRS</h1>
        <p class="text-slate-400">Pilih mata kuliah untuk semester ini</p>
    </div>

    <!-- Main Content Card -->
    <div class="bg-slate-800 rounded-xl p-6 mb-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-xl font-semibold text-white mb-1">Daftar Mata Kuliah</h2>
                <p class="text-slate-400 text-sm">Pilih mata kuliah yang ingin diambil</p>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-slate-700 rounded-lg p-4 flex items-center gap-3">
                <div class="w-10 h-10 bg-red-500 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-slate-400 text-sm">Mata Kuliah Tersedia</p>
                    <p class="text-white text-xl font-bold">{{ $jadwal->count() }}</p>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="bg-slate-700 rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-slate-600">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-slate-300 uppercase tracking-wider">No</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-slate-300 uppercase tracking-wider">Mata Kuliah</th>
                            <th class="px-6 py-4 text-center text-xs font-medium text-slate-300 uppercase tracking-wider">SKS</th>
                            <th class="px-6 py-4 text-center text-xs font-medium text-slate-300 uppercase tracking-wider">Kelas</th>
                            <th class="px-6 py-4 text-center text-xs font-medium text-slate-300 uppercase tracking-wider">Jam</th>
                            <th class="px-6 py-4 text-center text-xs font-medium text-slate-300 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-600">
                        @foreach ($jadwal as $item)
                        <tr class="hover:bg-slate-600 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center text-white text-sm font-medium">
                                    {{ $loop->iteration }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-emerald-500 rounded-lg flex items-center justify-center text-white text-sm font-bold">
                                        D
                                    </div>
                                    <div>
                                        <p class="text-white font-medium">{{ $item->kelas->mata_kuliah->nama ?? '-' }}</p>
                                        <p class="text-slate-400 text-sm">{{ $item->kelas->mata_kuliah->kode ?? '' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    {{ $item->kelas->mata_kuliah->sks ?? '-' }} SKS
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <div class="w-6 h-6 bg-purple-500 rounded flex items-center justify-center text-white text-xs font-bold">
                                        {{ substr($item->kelas->kode_kelas ?? 'K', 0, 1) }}
                                    </div>
                                    <span class="text-white">{{ $item->kelas->kode_kelas ?? '-' }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-white">
                                        {{ \Carbon\Carbon::parse($item->jam_mulai)->format('H:i') }}-{{ \Carbon\Carbon::parse($item->jam_selesai)->format('H:i') }}
                                    </span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <form action="{{ route('mahasiswa.krs.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="jadwal_id" value="{{ $item->id_jadwal }}">
                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded-lg text-sm font-medium transition-colors duration-200 flex items-center gap-1 mx-auto">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        Tambah
                                    </button>
                                </form>
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