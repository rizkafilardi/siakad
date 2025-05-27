@extends('layouts.mahasiswa')

@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');

.premium-container {
    font-family: 'Poppins', sans-serif;
}

.floating-particles {
    position: absolute;
    width: 100%;
    height: 100%;
    overflow: hidden;
    z-index: 1;
    pointer-events: none;
}

.particle {
    position: absolute;
    background: linear-gradient(45deg, #ef4444, #dc2626, #b91c1c);
    border-radius: 50%;
    animation: float-particle 25s infinite linear;
    opacity: 0.08;
}

.particle:nth-child(1) { width: 4px; height: 4px; left: 10%; animation-delay: 0s; }
.particle:nth-child(2) { width: 6px; height: 6px; left: 20%; animation-delay: 4s; }
.particle:nth-child(3) { width: 3px; height: 3px; left: 30%; animation-delay: 8s; }
.particle:nth-child(4) { width: 5px; height: 5px; left: 40%; animation-delay: 12s; }
.particle:nth-child(5) { width: 4px; height: 4px; left: 50%; animation-delay: 16s; }
.particle:nth-child(6) { width: 7px; height: 7px; left: 60%; animation-delay: 20s; }
.particle:nth-child(7) { width: 3px; height: 3px; left: 70%; animation-delay: 24s; }
.particle:nth-child(8) { width: 5px; height: 5px; left: 80%; animation-delay: 28s; }
.particle:nth-child(9) { width: 4px; height: 4px; left: 90%; animation-delay: 32s; }

@keyframes float-particle {
    0% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
    10% { opacity: 0.08; }
    90% { opacity: 0.08; }
    100% { transform: translateY(-100vh) rotate(360deg); opacity: 0; }
}

.glass-card {
    backdrop-filter: blur(30px);
    background: linear-gradient(135deg, 
        rgba(255, 255, 255, 0.15) 0%, 
        rgba(255, 255, 255, 0.08) 50%, 
        rgba(255, 255, 255, 0.15) 100%);
    border: 1px solid rgba(255, 255, 255, 0.25);
    box-shadow: 
        0 30px 60px rgba(0, 0, 0, 0.4),
        0 0 0 1px rgba(255, 255, 255, 0.15) inset,
        0 2px 4px rgba(255, 255, 255, 0.15) inset;
}

.premium-card {
    position: relative;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.premium-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    transition: left 0.6s;
}

.premium-card:hover::before {
    left: 100%;
}

.premium-card:hover {
    transform: translateY(-5px) scale(1.01);
    box-shadow: 
        0 40px 80px rgba(0, 0, 0, 0.5),
        0 0 0 1px rgba(239, 68, 68, 0.3) inset;
}

.gradient-text {
    background: linear-gradient(135deg, #ef4444, #dc2626, #b91c1c, #991b1b);
    background-size: 300% 300%;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: gradient-shift 3s ease-in-out infinite;
}

@keyframes gradient-shift {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}

.sparkle {
    position: absolute;
    width: 4px;
    height: 4px;
    background: #ef4444;
    border-radius: 50%;
    animation: sparkle 2.5s infinite;
}

@keyframes sparkle {
    0%, 100% { opacity: 0; transform: scale(0); }
    50% { opacity: 1; transform: scale(1); }
}

.sparkle:nth-child(1) { top: 10%; left: 15%; animation-delay: 0s; }
.sparkle:nth-child(2) { top: 20%; right: 20%; animation-delay: 0.8s; }
.sparkle:nth-child(3) { bottom: 25%; left: 25%; animation-delay: 1.6s; }
.sparkle:nth-child(4) { bottom: 15%; right: 15%; animation-delay: 2.4s; }
.sparkle:nth-child(5) { top: 60%; left: 10%; animation-delay: 3.2s; }
.sparkle:nth-child(6) { top: 70%; right: 30%; animation-delay: 4s; }

.luxury-border {
    background: linear-gradient(45deg, #ef4444, #dc2626, #b91c1c, #991b1b);
    background-size: 300% 300%;
    animation: border-flow 4s ease-in-out infinite;
    padding: 4px;
    border-radius: 28px;
}

@keyframes border-flow {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}

.content-inner {
    background: linear-gradient(135deg, rgba(15, 23, 42, 0.95), rgba(30, 41, 59, 0.9));
    border-radius: 24px;
}

.pulse-glow {
    animation: pulse-glow 2s ease-in-out infinite alternate;
}

@keyframes pulse-glow {
    0% { 
        box-shadow: 0 0 20px rgba(239, 68, 68, 0.3);
        filter: drop-shadow(0 0 10px rgba(239, 68, 68, 0.3));
    }
    100% { 
        box-shadow: 0 0 40px rgba(239, 68, 68, 0.6);
        filter: drop-shadow(0 0 20px rgba(239, 68, 68, 0.6));
    }
}

.header-icon {
    animation: icon-float 3s ease-in-out infinite;
}

@keyframes icon-float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-5px) rotate(5deg); }
}

.profile-field {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(248, 250, 252, 0.95));
    border: 1px solid rgba(239, 68, 68, 0.2);
    border-radius: 16px;
    padding: 1.5rem;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

.profile-field::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(239, 68, 68, 0.05), transparent);
    transition: left 0.5s;
}

.profile-field:hover::before {
    left: 100%;
}

.profile-field:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 35px rgba(239, 68, 68, 0.15);
    border-color: rgba(239, 68, 68, 0.3);
}

.field-label {
    color: #374151;
    font-weight: 600;
    font-size: 0.875rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin-bottom: 0.75rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.field-value {
    color: #1f2937;
    font-weight: 700;
    font-size: 1.25rem;
    padding: 1rem;
    background: linear-gradient(135deg, rgba(239, 68, 68, 0.05), rgba(220, 38, 38, 0.02));
    border: 1px solid rgba(239, 68, 68, 0.1);
    border-radius: 12px;
    position: relative;
    overflow: hidden;
}

.field-value::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 4px;
    height: 100%;
    background: linear-gradient(to bottom, #ef4444, #dc2626, #b91c1c);
    animation: value-line 3s ease-in-out infinite;
}

@keyframes value-line {
    0%, 100% { transform: scaleY(1); opacity: 0.5; }
    50% { transform: scaleY(1.1); opacity: 1; }
}

.logout-button {
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, #dc2626, #b91c1c, #991b1b);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 10px 25px rgba(220, 38, 38, 0.3);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 16px;
    padding: 1rem 2rem;
    color: white;
    font-weight: 700;
    font-size: 1rem;
    cursor: pointer;
}

.logout-button::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.5s;
}

.logout-button:hover::before {
    left: 100%;
}

.logout-button:hover {
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 20px 40px rgba(220, 38, 38, 0.4);
    background: linear-gradient(135deg, #b91c1c, #991b1b, #7f1d1d);
}

.avatar-container {
    position: relative;
    width: 120px;
    height: 120px;
    margin: 0 auto 2rem;
}

.avatar-ring {
    position: absolute;
    inset: -4px;
    background: linear-gradient(45deg, #ef4444, #dc2626, #b91c1c, #991b1b);
    background-size: 300% 300%;
    animation: avatar-ring 4s ease-in-out infinite;
    border-radius: 50%;
    padding: 4px;
}

@keyframes avatar-ring {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}

.avatar-inner {
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(15, 23, 42, 0.95), rgba(30, 41, 59, 0.9));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 3rem;
    position: relative;
    overflow: hidden;
}

.avatar-inner::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    animation: avatar-shine 3s infinite;
}

@keyframes avatar-shine {
    0% { left: -100%; }
    100% { left: 100%; }
}

.profile-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.stat-card {
    background: linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(220, 38, 38, 0.05));
    border: 1px solid rgba(239, 68, 68, 0.2);
    border-radius: 20px;
    padding: 1.5rem;
    text-align: center;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(239, 68, 68, 0.1), transparent);
    transition: left 0.5s;
}

.stat-card:hover::before {
    left: 100%;
}

.stat-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(239, 68, 68, 0.2);
}

.floating-mascot {
    animation: float-mascot 6s ease-in-out infinite;
    position: relative;
}

@keyframes float-mascot {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    33% { transform: translateY(-15px) rotate(2deg); }
    66% { transform: translateY(-8px) rotate(-2deg); }
}
</style>

<div class="premium-container min-h-screen w-full bg-gradient-to-br from-gray-900 via-black to-red-900 text-white p-6 md:p-10 relative overflow-hidden">

    <!-- Floating Particles Background -->
    <div class="floating-particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <!-- Background Gradient Orbs -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-red-400/20 to-red-600/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-gradient-to-tr from-red-500/20 to-red-700/20 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-gradient-to-r from-red-400/10 to-red-600/10 rounded-full blur-3xl"></div>
    </div>

    <!-- Sparkles -->
    <div class="sparkle"></div>
    <div class="sparkle"></div>
    <div class="sparkle"></div>
    <div class="sparkle"></div>
    <div class="sparkle"></div>
    <div class="sparkle"></div>

    <!-- Main Content -->
    <div class="relative z-10 max-w-4xl mx-auto">
        
        <!-- Header Section -->
        <div class="luxury-border mb-10">
            <div class="content-inner p-8">
                <div class="glass-card premium-card rounded-3xl p-8">
                    <div class="text-center mb-8">
                        <div class="header-icon w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-2xl flex items-center justify-center pulse-glow mx-auto mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <h1 class="text-4xl font-bold gradient-text mb-2">Profil Mahasiswa</h1>
                        <p class="text-gray-300 text-lg">Informasi Akun & Data Pribadi</p>
                    </div>

                    <!-- Avatar Section -->
                    <div class="avatar-container">
                        <div class="avatar-ring">
                            <div class="avatar-inner">
                                <svg class="w-12 h-12 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                            <p class="text-white font-bold text-xl">Aktif</p>
                            <p class="text-gray-300 text-sm">Status Akun</p>
                        </div>

                        <div class="stat-card">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center mx-auto mb-3">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                </svg>
                            </div>
                            <p class="text-white font-bold text-xl">2025/2026</p>
                            <p class="text-gray-300 text-sm">Tahun Ajaran</p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <!-- Profile Information -->
        <div class="luxury-border mb-10">
            <div class="content-inner p-8">
                <div class="space-y-8">
                    
                    <!-- Name Field -->
                    <div class="profile-field">
                        <div class="field-label">
                            <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                            <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.414-4.414a2 2 0 010 2.828L11.828 15H9v-2.828l8.586-8.586a2 2 0 012.828 0z"></path>
                            </svg>
                            Email
                        </div>
                        <div class="field-value">
                            <div class="flex items-center gap-3">
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm bg-gradient-to-r from-red-100 to-red-200 text-red-800 font-bold">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                    {{ $user->email }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- Role Field -->
                    <div class="profile-field">
                        <div class="field-label">
                            <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.414-4.414a2 2 0 010 2.828L11.828 15H9v-2.828l8.586-8.586a2 2 0 012.828 0z"></path>
                            </svg>
                            Peran Pengguna
                        </div>
                        <div class="field-value">
                            <div class="flex items-center gap-3">
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm bg-gradient-to-r from-red-100 to-red-200 text-red-800 font-bold">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                    {{ $user->role }}
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Logout Section -->
        <div class="luxury-border">
            <div class="content-inner p-8">
                <div class="glass-card premium-card rounded-3xl p-8">
                    <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                        
                        <!-- Left Content -->
                        <div class="text-center md:text-left">
                            <h3 class="text-2xl font-bold text-white mb-2 flex items-center gap-3 justify-center md:justify-start">
                                <div class="w-8 h-8 bg-gradient-to-br from-red-500 to-red-600 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                </div>
                                Keluar Sistem
                            </h3>
                            <p class="text-gray-300">Akhiri sesi dan kembali ke halaman login</p>
                        </div>

                        <!-- Logout Form -->
                        <form action="{{ route('auth.logout') }}" method="POST" class="flex-shrink-0">
                            @csrf
                            @method('delete')
                            <button type="submit" class="logout-button flex items-center gap-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                Logout
                            </button>
                        </form>

                        <div class="mt-6 md:mt-4">
                            <a href="{{ route('mahasiswa.profile.edit') }}"
                                class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded shadow transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit Akun
                            </a>
                        </div>

                        <!-- Mascot -->
                        <div class="floating-mascot hidden lg:block">
                            <div class="w-24 h-24 bg-gradient-to-br from-red-400 to-red-500 rounded-full flex items-center justify-center text-3xl">
                                👋
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Decoration -->
    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-red-500 to-transparent opacity-50"></div>
</div>
@endsection
