@extends('layouts.mahasiswa')

@section('content')
<style>
.profile-container {
    font-family: 'Inter', sans-serif;
}

.glass-card {
    backdrop-filter: blur(15px);
    background: linear-gradient(135deg, 
        rgba(255, 255, 255, 0.1) 0%, 
        rgba(255, 255, 255, 0.05) 50%, 
        rgba(236, 72, 153, 0.05) 100%);
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 15px 35px rgba(236, 72, 153, 0.15);
}

.profile-card {
    transition: all 0.3s ease;
}

.profile-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 20px 40px rgba(236, 72, 153, 0.2);
}

.gradient-text {
    background: linear-gradient(135deg, #ec4899, #db2777);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    font-weight: 700;
}

.profile-field {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(248, 250, 252, 0.9));
    border: 1px solid rgba(236, 72, 153, 0.2);
    border-radius: 12px;
    padding: 1.5rem;
    transition: all 0.3s ease;
    box-shadow: 0 8px 20px rgba(236, 72, 153, 0.08);
}

.profile-field:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 25px rgba(236, 72, 153, 0.15);
    border-color: rgba(236, 72, 153, 0.3);
}

.field-label {
    color: #374151;
    font-weight: 600;
    font-size: 0.875rem;
    margin-bottom: 0.75rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.field-value {
    color: #1f2937;
    font-weight: 600;
    font-size: 1.125rem;
    padding: 1rem;
    background: linear-gradient(135deg, rgba(236, 72, 153, 0.05), rgba(219, 39, 119, 0.02));
    border: 1px solid rgba(236, 72, 153, 0.1);
    border-radius: 10px;
}

.logout-button {
    background: linear-gradient(135deg, #db2777, #be185d);
    transition: all 0.3s ease;
    box-shadow: 0 8px 20px rgba(219, 39, 119, 0.25);
    border-radius: 12px;
    padding: 0.875rem 1.75rem;
    color: white;
    font-weight: 700;
    cursor: pointer;
    border: none;
}

.logout-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 25px rgba(219, 39, 119, 0.35);
}

.avatar-container {
    width: 80px;
    height: 80px;
    margin: 0 auto 1.5rem;
    position: relative;
}

.avatar-ring {
    position: absolute;
    inset: -3px;
    background: linear-gradient(45deg, #ec4899, #db2777);
    border-radius: 50%;
    padding: 3px;
}

.avatar-inner {
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(15, 23, 42, 0.9), rgba(30, 41, 59, 0.8));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
}

.profile-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.stat-card {
    background: linear-gradient(135deg, rgba(236, 72, 153, 0.1), rgba(219, 39, 119, 0.05));
    border: 1px solid rgba(236, 72, 153, 0.2);
    border-radius: 16px;
    padding: 1.5rem;
    text-align: center;
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(236, 72, 153, 0.2);
}

.edit-button {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    transition: all 0.3s ease;
    box-shadow: 0 6px 15px rgba(59, 130, 246, 0.25);
    border-radius: 10px;
    padding: 0.625rem 1.25rem;
    color: white;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.875rem;
}

.edit-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(59, 130, 246, 0.35);
    text-decoration: none;
    color: white;
}
</style>

<div class="profile-container min-h-screen w-full bg-gradient-to-br from-gray-900 via-gray-800 to-pink-900 text-white p-6 relative">

    <!-- Main Content -->
    <div class="relative z-10 max-w-4xl mx-auto">
        
        <!-- Header Section -->
        <div class="bg-gray-800 rounded-2xl p-8 mb-8 border border-gray-700">
            <div class="glass-card profile-card rounded-2xl p-8">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-gradient-to-br from-pink-500 to-pink-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h1 class="text-3xl font-bold gradient-text mb-3">Profil Mahasiswa</h1>
                    <p class="text-gray-300 text-lg">Informasi Akun & Data Pribadi</p>
                </div>

                <!-- Avatar Section -->
                <div class="avatar-container">
                    <div class="avatar-ring">
                        <div class="avatar-inner">
                            <svg class="w-8 h-8 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Profile Stats -->
                <div class="profile-stats">
                    <div class="stat-card">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <p class="text-white font-bold text-lg">Aktif</p>
                        <p class="text-gray-300 text-sm">Status Akun</p>
                    </div>

                    <div class="stat-card">
                        <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                        </div>
                        <p class="text-white font-bold text-lg">2025/2026</p>
                        <p class="text-gray-300 text-sm">Tahun Ajaran</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Information -->
        <div class="bg-gray-800 rounded-2xl p-8 mb-8 border border-gray-700">
            <div class="space-y-6">
                
                <!-- Name Field -->
                <div class="profile-field">
                    <div class="field-label">
                        <svg class="w-4 h-4 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Nama Lengkap
                    </div>
                    <div class="field-value">
                        {{ $user->username }}
                    </div>
                </div>

                <!-- Email Field -->
                <div class="profile-field">
                    <div class="field-label">
                        <svg class="w-4 h-4 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                        </svg>
                        Email
                    </div>
                    <div class="field-value">
                        <span class="inline-flex items-center px-4 py-2 rounded-xl text-sm bg-gradient-to-r from-pink-100 to-pink-200 text-pink-800 font-bold">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            {{ $user->email }}
                        </span>
                    </div>
                </div>

                <!-- Role Field -->
                <div class="profile-field">
                    <div class="field-label">
                        <svg class="w-4 h-4 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                        Peran Pengguna
                    </div>
                    <div class="field-value">
                        <span class="inline-flex items-center px-4 py-2 rounded-xl text-sm bg-gradient-to-r from-pink-100 to-pink-200 text-pink-800 font-bold">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                            </svg>
                            {{ $user->role }}
                        </span>
                    </div>
                </div>

            </div>
        </div>

        <!-- Logout Section -->
        <div class="bg-gray-800 rounded-2xl p-8 border border-gray-700">
            <div class="glass-card profile-card rounded-2xl p-8">
                <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                    
                    <!-- Left Content -->
                    <div class="text-center md:text-left">
                        <h3 class="text-2xl font-bold text-white mb-2 flex items-center gap-3 justify-center md:justify-start">
                            <div class="w-10 h-10 bg-gradient-to-br from-pink-500 to-pink-600 rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                            </div>
                            Keluar Sistem
                        </h3>
                        <p class="text-gray-300 font-medium">Akhiri sesi dan kembali ke halaman login</p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col gap-3">
                        <!-- Edit Button -->
                        <a href="{{ route('mahasiswa.profile.edit') }}" class="edit-button">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Edit Akun
                        </a>

                        <!-- Logout Form -->
                        <form action="{{ route('auth.logout') }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="logout-button flex items-center gap-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection