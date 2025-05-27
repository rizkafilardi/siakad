@extends('layouts.app')

@section('page-title', 'Dashboard')
@section('page-description', 'Ringkasan sistem informasi akademik')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700;800&display=swap');

    .glass-card {
        background: rgba(255, 255, 255, 0.9);
        border: 1px solid rgba(236, 72, 153, 0.1);
        box-shadow: 0 4px 20px rgba(236, 72, 153, 0.08);
        backdrop-filter: blur(10px);
    }

    .stat-card {
        transition: all 0.3s ease;
        background: linear-gradient(145deg, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.85));
    }

    .stat-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 15px 35px rgba(236, 72, 153, 0.15);
    }

    .gradient-text {
        background: linear-gradient(135deg, #ec4899, #be185d, #9d174d);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .floating-animation {
        animation: float 6s ease-in-out infinite;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }
    
    .pulse-animation {
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.7; }
    }
    
    /* Fix scrolling issues */
    .scrollable-content {
        height: auto;
        overflow-y: visible;
        padding-bottom: 2rem;
    }
</style>

<div class="dashboard-container scrollable-content">
    <!-- Welcome Section -->
    <div class="mb-8">
        <div class="glass-card rounded-3xl p-6 relative overflow-hidden">
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-5">
                <div class="absolute top-0 right-0 w-32 h-32 bg-pink-400 rounded-full blur-2xl"></div>
                <div class="absolute bottom-0 left-0 w-40 h-40 bg-rose-400 rounded-full blur-3xl"></div>
            </div>
            
            <div class="relative z-10 text-center">
                <h1 class="text-3xl lg:text-4xl font-bold mb-2 text-gray-800">
                    Selamat Datang, <span class="gradient-text">{{$user->username}}</span>
                </h1>
                <div class="flex items-center justify-center gap-2 text-gray-600 mb-4">
                    <div class="w-2 h-2 bg-pink-400 rounded-full pulse-animation"></div>
                    <p class="text-base font-medium">Tahun Ajaran 2025/2026</p>
                </div>
                
                <!-- Quote -->
                <div class="glass-card rounded-2xl p-4 max-w-2xl mx-auto">
                    <p class="text-gray-700 italic text-sm leading-relaxed">
                        "Setiap ilmu yang Ibu/Bapak ajarkan hari ini, adalah cahaya yang akan menerangi masa depan banyak generasi."
                    </p>
                    <p class="text-pink-500 text-xs mt-2 font-medium">— Inspirasi Pendidik</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
        <!-- Mahasiswa Card -->
        <div class="stat-card glass-card rounded-xl p-6 group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-gradient-to-r from-pink-500 to-pink-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <span class="text-2xl">🎓</span>
            </div>
            <h3 class="text-gray-800 font-semibold text-lg mb-2">Total Mahasiswa</h3>
            <p class="text-3xl font-bold text-pink-400 mb-1">{{ $mahasiswaCount }}</p>
            <p class="text-gray-500 text-sm">+12% dari tahun lalu</p>
        </div>
        
        <!-- Dosen Card -->
        <div class="stat-card glass-card rounded-xl p-6 group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-gradient-to-r from-rose-500 to-rose-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <span class="text-2xl">📋</span>
            </div>
            <h3 class="text-gray-800 font-semibold text-lg mb-2">Total Dosen</h3>
            <p class="text-3xl font-bold text-rose-400 mb-1">{{$dosenCount}}</p>
            <p class="text-gray-500 text-sm">+3 dosen baru</p>
        </div>
        
        <!-- Mata Kuliah Card -->
        <div class="stat-card glass-card rounded-xl p-6 group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-gradient-to-r from-pink-500 to-pink-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <span class="text-2xl">📄</span>
            </div>
            <h3 class="text-gray-800 font-semibold text-lg mb-2">Mata Kuliah</h3>
            <p class="text-3xl font-bold text-pink-400 mb-1">{{$mata_kuliahCount}}</p>
            <p class="text-gray-500 text-sm">Semester aktif</p>
        </div>
        
        <!-- Kelas Card -->
        <div class="stat-card glass-card rounded-xl p-6 group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-gradient-to-r from-rose-500 to-rose-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10v11M20 10v11"></path>
                    </svg>
                </div>
                <span class="text-2xl">🏛️</span>
            </div>
            <h3 class="text-gray-800 font-semibold text-lg mb-2">Total Kelas</h3>
            <p class="text-3xl font-bold text-rose-400 mb-1">{{$kelasCount}}</p>
            <p class="text-gray-500 text-sm">Kelas aktif</p>
        </div>
        <div class="stat-card glass-card rounded-xl p-6 group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-gradient-to-r from-pink-500 to-pink-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                    </svg>
                </div>
                <span class="text-2xl">🎯</span>
            </div>
            <h3 class="text-gray-800 font-semibold text-lg mb-2">Total Fakultas</h3>
            <p class="text-3xl font-bold text-pink-400 mb-1">{{$fakultasCount}}</p>
        </div>
        <div class="stat-card glass-card rounded-xl p-6 group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-gradient-to-r from-rose-500 to-rose-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v6a2 2 0 002 2h2m0-8h2a2 2 0 012 2v6a2 2 0 01-2 2H9m0-8v8m0-8h6m-6 0V3a2 2 0 012-2h2a2 2 0 012 2v2M9 5v8"></path>
                    </svg>
                </div>
                <span class="text-2xl">📊</span>
            </div>
            <h3 class="text-gray-800 font-semibold text-lg mb-2">Total Prodi</h3>
            <p class="text-3xl font-bold text-rose-400 mb-1">{{$prodiCount}}</p>
        </div>
    </div>
    
    <!-- System Status -->
    <div class="glass-card rounded-xl p-6 mb-8">
        <h3 class="text-xl font-semibold text-gray-800 mb-6 flex items-center gap-3">
            <div class="w-6 h-6 bg-pink-500 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            Status Sistem
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="text-center">
                <div class="w-16 h-16 bg-pink-500 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <p class="text-gray-800 font-semibold">Server Online</p>
                <p class="text-gray-500 text-sm">99.9% Uptime</p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-rose-500 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path>
                    </svg>
                </div>
                <p class="text-gray-800 font-semibold">Database</p>
                <p class="text-gray-500 text-sm">Optimal</p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-pink-500 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <p class="text-gray-800 font-semibold">Keamanan</p>
                <p class="text-gray-500 text-sm">Terlindungi</p>
            </div>
        </div>
    </div>
    
    <!-- Footer Info -->
    <div class="glass-card rounded-xl p-6 text-center">
        <p class="text-gray-600 mb-2">Sistem Informasi Akademik</p>
        <p class="text-gray-500 text-sm">© 2025 SIAKAD. Semua hak dilindungi undang-undang.</p>
        <div class="flex justify-center items-center gap-4 mt-4">
            <span class="text-pink-400 text-sm">● Online</span>
            <span class="text-gray-500 text-sm">|</span>
            <span class="text-gray-500 text-sm">Versi 2.1.0</span>
            <span class="text-gray-500 text-sm">|</span>
            <span class="text-gray-500 text-sm">Last Update: 24 Mei 2025</span>
        </div>
    </div>
</div>
@endsection