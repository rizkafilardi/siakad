@extends('layouts.app')

@section('page-title', 'Data Fakultas')
@section('page-description', 'Kelola data fakultas sistem informasi akademik')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700;800&display=swap');

    .glass-card {
        background: rgba(255, 255, 255, 0.9);
        border: 1px solid rgba(236, 72, 153, 0.1);
        box-shadow: 0 4px 20px rgba(236, 72, 153, 0.08);
        backdrop-filter: blur(10px);
    }

    .table-row {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .table-row:hover {
        background: rgba(236, 72, 153, 0.05);
        transform: translateX(2px);
    }
    
    .action-btn {
        transition: all 0.3s ease;
    }
    
    .action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }
</style>

<div class="dashboard-container">
    <div class="space-y-6">
        <!-- Header -->
        <div class="glass-card rounded-xl p-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Data Fakultas</h2>
                    <p class="text-gray-600">Kelola informasi fakultas dalam sistem</p>
                </div>
                <a href="{{ route('admin.fakultas.create') }}" 
                   class="action-btn bg-gradient-to-r from-pink-500 to-pink-600 hover:from-pink-600 hover:to-pink-700 px-6 py-3 rounded-xl text-white font-semibold shadow-lg flex items-center gap-3 group">
                    <svg class="w-5 h-5 group-hover:rotate-90 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Tambah Fakultas
                </a>
            </div>
        </div>

        <!-- Tabel Fakultas -->
        <div class="glass-card rounded-xl overflow-hidden">
            <div class="p-6 border-b border-gray-100">
                <h3 class="text-lg font-semibold text-gray-800">Daftar Fakultas</h3>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Fakultas</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Prodi</th>
                            <th class="px-6 py-4 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @forelse ($fakultas as $item)
                        <tr class="table-row">
                            <td class="px-6 py-4 text-sm text-gray-600">
                                <div class="w-8 h-8 bg-indigo-500 rounded-full flex items-center justify-center text-white font-semibold text-xs">
                                    {{ $loop->iteration }}
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-800 text-sm font-medium">
                                {{ $item->nama }}
                            </td>
                            <td class="px-6 py-4 text-gray-800 text-sm">
                                {{ $item->prodi_count }} Program Studi
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('admin.fakultas.edit', $item->id_fakultas) }}" 
                                       class="action-btn bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium flex items-center gap-2 group">
                                        <svg class="w-4 h-4 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.fakultas.destroy', $item->id_fakultas) }}" method="POST" onsubmit="return confirm('Yakin hapus data program studi ini?')" class="inline">
                                        @csrf 
                                        @method('DELETE')
                                    <button type="submit" 
                                            class="action-btn bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-black px-4 py-2 rounded-lg text-sm font-medium flex items-center gap-2 group">
                                        <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Hapus
                                    </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center gap-4">
                                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-gray-600 font-medium">Tidak ada data fakultas</p>
                                        <p class="text-gray-500 text-sm">Mulai dengan menambahkan fakultas baru</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection