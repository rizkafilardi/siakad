@extends('layouts.mahasiswa')

@section('content')
<div class="min-h-screen w-full bg-gray-900 text-white p-6">
    <!-- Header Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-white mb-2">Data KRS</h1>
        <p class="text-gray-400">Kartu Rencana Studi Semester Ini</p>
    </div>

    <!-- Main Content Card -->
    <div class="bg-gray-800 rounded-xl p-6 mb-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-xl font-semibold text-white mb-1">Data KRS</h2>
                <p class="text-gray-400 text-sm">Kelola mata kuliah yang telah dipilih</p>
            </div>
            <a href="{{ route('mahasiswa.krs.create') }}" class="px-4 py-2 rounded-lg text-white font-medium shadow-lg transition-colors duration-200 flex items-center gap-2" style="background-color: #ec4899;" onmouseover="this.style.backgroundColor='#db2777'" onmouseout="this.style.backgroundColor='#ec4899'">
                <span class="text-lg">+</span>
                Tambah KRS
            </a>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-gray-700 rounded-lg p-4 flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background-color: #ec4899;">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-gray-400 text-sm">Total KRS</p>
                    <p class="text-white text-xl font-bold">{{ $krs->count() }}</p>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="bg-gray-700 rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead style="background-color: #db2777;">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider">No</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider">Mahasiswa</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider">Mata Kuliah</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider">Kelas</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider">Tahun Ajaran</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider">Semester</th>
                            <th class="px-6 py-4 text-center text-xs font-medium text-white uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-600">
                        @foreach ($krs as $item)
                        <tr class="hover:bg-gray-600 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="w-8 h-8 rounded-full flex items-center justify-center text-white text-sm font-medium" style="background-color: #ec4899;">
                                    {{ $loop->iteration }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <span class="text-white font-medium">{{ $item->mahasiswa->nama ?? '-' }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div>
                                        <p class="text-white font-medium">{{ $item->jadwal->kelas->mata_kuliah->nama ?? '-' }}</p>
                                        <p class="text-gray-400 text-sm">{{ $item->jadwal->kelas->mata_kuliah->kode ?? '' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-2">
                                    <span class="text-white">{{ $item->jadwal->kelas->kode_kelas ?? '-' }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium text-white" style="background-color: #ec4899;">
                                    {{ $item->tahun_ajaran }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium text-white" style="background-color: #db2777;">
                                    Semester {{ $item->jadwal->kelas->mata_kuliah->semester }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <form action="{{ route('mahasiswa.krs.destroy', $item->id_krs) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus?')">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="text-white px-3 py-1.5 rounded-lg text-sm font-medium transition-colors duration-200 flex items-center gap-1 mx-auto" style="background-color: #ec4899;" onmouseover="this.style.backgroundColor='#db2777'" onmouseout="this.style.backgroundColor='#ec4899'">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Hapus
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