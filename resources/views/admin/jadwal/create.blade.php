@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700;800&display=swap');
    
    .dashboard-container {
        font-family: 'Nunito', sans-serif;
        background: linear-gradient(135deg, #fdf2f8 0%, #fce7f3 50%, #fbcfe8 100%);
        min-height: 100vh;
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.9);
        border: 1px solid rgba(236, 72, 153, 0.1);
        box-shadow: 0 4px 20px rgba(236, 72, 153, 0.08);
        backdrop-filter: blur(10px);
    }
    
    .floating-animation {
        animation: float 6s ease-in-out infinite;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }
    
    .form-input {
        background: rgba(255, 255, 255, 0.9);
        border: 1px solid rgba(209, 213, 219, 0.5);
        transition: all 0.3s ease;
        color: #374151;
    }
    
    .form-input:focus {
        border-color: #ec4899;
        box-shadow: 0 0 0 3px rgba(236, 72, 153, 0.1);
        background: rgba(255, 255, 255, 1);
        outline: none;
    }

    .form-input option {
        background: white;
        color: #374151;
    }

    .action-btn {
        transition: all 0.3s ease;
    }
    
    .action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }
</style>

<div class="dashboard-container">
    <div class="min-h-screen p-4 md:p-6 lg:p-8 flex items-center justify-center">
        <div class="relative z-10 w-full max-w-2xl">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="floating-animation inline-block mb-4">
                    <div class="w-16 h-16 bg-gradient-to-r from-pink-500 to-pink-600 rounded-2xl flex items-center justify-center mx-auto shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
                </div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Tambah Jadwal</h1>
                <p class="text-gray-600">Buat jadwal perkuliahan baru</p>
            </div>

            <!-- Form -->
            <div class="glass-card rounded-2xl p-8">
                <form action="{{ route('admin.jadwal.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <!-- Kelas -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <svg class="w-4 h-4 inline mr-2 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                            </svg>
                            Kelas
                        </label>
                        <select name="kelas_id" class="form-input w-full px-4 py-3 rounded-xl focus:outline-none" required>
                            <option value="">-- Pilih Kelas --</option>
                            @foreach($kelas as $k)
                                <option value="{{ $k->id_kelas }}">{{ $k->kode_kelas . " - " . $k->mata_kuliah->nama}}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Hari -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <svg class="w-4 h-4 inline mr-2 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Hari
                        </label>
                        <input type="text" name="hari" placeholder="Hari (contoh: Senin)" class="form-input w-full px-4 py-3 rounded-xl placeholder-gray-400 focus:outline-none" required>
                    </div>

                    <!-- Jam -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <svg class="w-4 h-4 inline mr-2 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Jam Mulai
                            </label>
                            <input type="time" name="jam_mulai" class="form-input w-full px-4 py-3 rounded-xl focus:outline-none" required>
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <svg class="w-4 h-4 inline mr-2 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Jam Selesai
                            </label>
                            <input type="time" name="jam_selesai" class="form-input w-full px-4 py-3 rounded-xl focus:outline-none" required>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-4 pt-6">
                        <button type="submit" class="action-btn flex-1 bg-gradient-to-r from-pink-500 to-pink-600 hover:from-pink-600 hover:to-pink-700 text-white font-bold py-3 px-6 rounded-xl transition-all duration-300 flex items-center justify-center gap-2 shadow-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Simpan Jadwal
                        </button>
                        
                        <a href="{{ route('admin.jadwal.index') }}" class="action-btn bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-6 rounded-xl transition-all duration-300 flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
