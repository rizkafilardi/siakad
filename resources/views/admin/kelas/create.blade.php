@extends('layouts.app')

@section('page-title', 'Tambah Kelas')
@section('page-description', 'Tambahkan data kelas baru ke sistem')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    
    .glass-card {
        backdrop-filter: blur(20px);
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }
    
    .form-input {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        transition: all 0.3s ease;
    }
    
    .form-input:focus {
        background: rgba(255, 255, 255, 0.1);
        border-color: #10b981;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
    }
    
    .form-input::placeholder {
        color: rgba(255, 255, 255, 0.5);
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #10b981, #059669);
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        background: linear-gradient(135deg, #059669, #047857);
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
    }
    
    .btn-secondary {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
    }
    
    .btn-secondary:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: translateY(-2px);
    }
</style>

<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="glass-card rounded-xl p-6 mb-8">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-gradient-to-r from-cyan-500 to-cyan-600 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-black">Tambah Kelas Baru</h2>
                <p class="text-gray-400">Lengkapi form di bawah untuk menambahkan kelas</p>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="glass-card rounded-xl p-8">
        <form action="{{ route('admin.kelas.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <!-- Kode Kelas & Ruangan -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="kode_kelas" class="block text-sm font-medium text-gray-300">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            Kode Kelas
                        </div>
                    </label>
                    <input type="text" 
                           id="kode_kelas" 
                           name="kode_kelas" 
                           placeholder="Contoh: Kelas A"
                           class="form-input w-full px-4 py-3 rounded-xl text-black placeholder-gray-400 focus:outline-none"
                           value="{{ old('kode_kelas') }}"
                           required>
                    @error('kode_kelas')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="ruangan" class="block text-sm font-medium text-gray-300">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Ruangan
                        </div>
                    </label>
                    <input type="text" 
                           id="ruangan" 
                           name="ruangan" 
                           placeholder="Contoh: TI 1"
                           class="form-input w-full px-4 py-3 rounded-xl text-black placeholder-gray-400 focus:outline-none"
                           value="{{ old('ruangan') }}"
                           required>
                    @error('ruangan')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Mata Kuliah -->
            <div class="space-y-2">
                <label for="mata_kuliah_id" class="block text-sm font-medium text-gray-300">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        Mata Kuliah
                    </div>
                </label>
                <div class="relative">
                    <select name="mata_kuliah_id" 
                            id="mata_kuliah_id" 
                            class="form-input w-full px-4 py-3 rounded-xl text-black focus:outline-none appearance-none pr-10"
                            required>
                        <option value="" disabled selected class="bg-gray-800 text-gray-400">Pilih Mata Kuliah</option>
                        @foreach($mata_kuliah as $mk)
                            <option value="{{ $mk->id_mata_kuliah }}" 
                                    {{ old('mata_kuliah_id') == $mk->id_mata_kuliah ? 'selected' : '' }}
                                    class="bg-gray-800 text-black py-2">
                                {{ $mk->nama }} ({{ $mk->kode }})
                            </option>
                        @endforeach
                    </select>
                    <!-- Custom dropdown arrow -->
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
                @error('mata_kuliah_id')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Info Section -->
            <div class="glass-card rounded-xl p-6 bg-blue-500/10 border border-blue-500/20">
                <div class="flex items-start gap-3">
                    <div class="w-6 h-6 text-blue-400 flex-shrink-0 mt-0.5">
                        <svg fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-blue-300 font-medium mb-1">Informasi Kelas</h4>
                        <p class="text-gray-300 text-sm leading-relaxed">
                            Setelah memilih mata kuliah, dosen pengampu akan otomatis ditampilkan berdasarkan data mata kuliah yang dipilih.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row justify-end gap-4 pt-6 border-t border-white/10">
                <a href="{{ route('admin.kelas.index') }}" 
                   class="btn-secondary px-6 py-3 rounded-xl text-black font-medium flex items-center justify-center gap-2 group">
                    <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Batal
                </a>
                <button type="submit" 
                        class="btn-primary px-6 py-3 rounded-xl text-black font-medium flex items-center justify-center gap-2 group">
                    <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
