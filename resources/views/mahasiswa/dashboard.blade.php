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
    animation: float-particle 20s infinite linear;
    opacity: 0.1;
}

.particle:nth-child(1) { width: 4px; height: 4px; left: 10%; animation-delay: 0s; }
.particle:nth-child(2) { width: 6px; height: 6px; left: 20%; animation-delay: 3s; }
.particle:nth-child(3) { width: 3px; height: 3px; left: 30%; animation-delay: 6s; }
.particle:nth-child(4) { width: 5px; height: 5px; left: 40%; animation-delay: 9s; }
.particle:nth-child(5) { width: 4px; height: 4px; left: 50%; animation-delay: 12s; }
.particle:nth-child(6) { width: 7px; height: 7px; left: 60%; animation-delay: 15s; }
.particle:nth-child(7) { width: 3px; height: 3px; left: 70%; animation-delay: 18s; }
.particle:nth-child(8) { width: 5px; height: 5px; left: 80%; animation-delay: 21s; }
.particle:nth-child(9) { width: 4px; height: 4px; left: 90%; animation-delay: 24s; }

@keyframes float-particle {
    0% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
    10% { opacity: 0.1; }
    90% { opacity: 0.1; }
    100% { transform: translateY(-100vh) rotate(360deg); opacity: 0; }
}

.glass-card {
    backdrop-filter: blur(25px);
    background: linear-gradient(135deg, 
        rgba(255, 255, 255, 0.1) 0%, 
        rgba(255, 255, 255, 0.05) 50%, 
        rgba(255, 255, 255, 0.1) 100%);
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 
        0 25px 50px rgba(0, 0, 0, 0.3),
        0 0 0 1px rgba(255, 255, 255, 0.1) inset,
        0 2px 4px rgba(255, 255, 255, 0.1) inset;
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
    transform: translateY(-8px) scale(1.02);
    box-shadow: 
        0 35px 70px rgba(0, 0, 0, 0.4),
        0 0 0 1px rgba(239, 68, 68, 0.3) inset,
        0 2px 4px rgba(239, 68, 68, 0.2) inset;
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

.floating-mascot {
    animation: float-mascot 6s ease-in-out infinite;
    position: relative;
}

@keyframes float-mascot {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    33% { transform: translateY(-15px) rotate(2deg); }
    66% { transform: translateY(-8px) rotate(-2deg); }
}

.premium-button {
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, #ffffff, #f8fafc, #e2e8f0);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 10px 25px rgba(239, 68, 68, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.premium-button::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(239, 68, 68, 0.1), transparent);
    transition: left 0.5s;
}

.premium-button:hover::before {
    left: 100%;
}

.premium-button:hover {
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 20px 40px rgba(239, 68, 68, 0.3);
    background: linear-gradient(135deg, #fef2f2, #ffffff, #f8fafc);
}

.sparkle {
    position: absolute;
    width: 4px;
    height: 4px;
    background: #ef4444;
    border-radius: 50%;
    animation: sparkle 2s infinite;
}

@keyframes sparkle {
    0%, 100% { opacity: 0; transform: scale(0); }
    50% { opacity: 1; transform: scale(1); }
}

.sparkle:nth-child(1) { top: 15%; left: 15%; animation-delay: 0s; }
.sparkle:nth-child(2) { top: 25%; right: 20%; animation-delay: 0.5s; }
.sparkle:nth-child(3) { bottom: 20%; left: 25%; animation-delay: 1s; }
.sparkle:nth-child(4) { bottom: 15%; right: 15%; animation-delay: 1.5s; }
.sparkle:nth-child(5) { top: 50%; left: 10%; animation-delay: 2s; }
.sparkle:nth-child(6) { top: 60%; right: 30%; animation-delay: 2.5s; }

.luxury-border {
    background: linear-gradient(45deg, #ef4444, #dc2626, #b91c1c, #991b1b);
    background-size: 300% 300%;
    animation: border-flow 4s ease-in-out infinite;
    padding: 3px;
    border-radius: 24px;
}

@keyframes border-flow {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}

.content-inner {
    background: linear-gradient(135deg, rgba(15, 23, 42, 0.95), rgba(30, 41, 59, 0.9));
    border-radius: 21px;
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

.quote-card {
    background: linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(220, 38, 38, 0.05));
    border: 1px solid rgba(239, 68, 68, 0.2);
    position: relative;
    overflow: hidden;
}

.quote-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 4px;
    height: 100%;
    background: linear-gradient(to bottom, #ef4444, #dc2626, #b91c1c);
    animation: quote-line 3s ease-in-out infinite;
}

@keyframes quote-line {
    0%, 100% { transform: scaleY(1); opacity: 0.5; }
    50% { transform: scaleY(1.1); opacity: 1; }
}

.year-badge {
    background: linear-gradient(135deg, #ef4444, #dc2626);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 50px;
    font-size: 0.875rem;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
    animation: badge-pulse 3s ease-in-out infinite;
}

@keyframes badge-pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

.mascot-glow {
    filter: drop-shadow(0 0 20px rgba(239, 68, 68, 0.3));
    transition: filter 0.3s ease;
}

.mascot-glow:hover {
    filter: drop-shadow(0 0 30px rgba(239, 68, 68, 0.5));
}

.welcome-connected {
    display: inline;
    line-height: 1.2;
}
</style>

<div class="premium-container min-h-screen w-full bg-gradient-to-br from-gray-900 via-black to-red-900 text-white p-6 md:p-10 flex flex-col justify-between rounded-r-xl relative overflow-hidden">
    
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

    <!-- Header Section -->
    <div class="relative z-10">
        <div class="luxury-border mb-8">
            <div class="content-inner p-8">
                <div class="glass-card premium-card rounded-2xl p-8">
                    <!-- Welcome Message - TERSAMBUNG -->
                    <div class="mb-8">
                        <h1 class="text-4xl md:text-5xl font-bold mb-4 welcome-connected">
                            <span class="text-white">Selamat Datang, </span><span class="gradient-text">{{ $user->username }}</span>
                        </h1>
                        
                        <div class="year-badge">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Tahun Ajaran 2025/2026
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-wrap gap-6 mb-8">
                        <button class="premium-button text-red-800 px-8 py-4 rounded-xl font-bold shadow-lg transition-all duration-300 flex items-center gap-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                </svg>
                            </div>
                            <div class="text-left">
                                <div class="font-bold">Jumlah Mahasiswa</div>
                                <div class="text-sm opacity-70">Data Terkini</div>
                            </div>
                        </button>
                        
                        <button class="premium-button text-red-800 px-8 py-4 rounded-xl font-bold shadow-lg transition-all duration-300 flex items-center gap-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div class="text-left">
                                <div class="font-bold">Jumlah Dosen</div>
                                <div class="text-sm opacity-70">Pengajar Aktif</div>
                            </div>
                        </button>
                    </div>

                    <!-- Inspirational Quote -->
                    <div class="quote-card rounded-xl p-6 relative">
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 text-red-400 flex-shrink-0 mt-1 pulse-glow">
                                <svg fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h4v10h-10z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-200 italic leading-relaxed text-lg">
                                    "Setiap ilmu yang Ibu/Bapak ajarkan hari ini,<br>
                                    adalah cahaya yang akan menerangi masa depan banyak generasi."
                                </p>
                                <p class="text-red-400 text-sm mt-4 font-semibold">— Inspirasi Pendidik</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mascot Section -->
    <div class="relative z-10 flex justify-end mt-10">
        <div class="floating-mascot">
            <div class="relative">
                <!-- Glow Ring -->
                <div class="absolute inset-0 bg-red-400 rounded-full opacity-20 blur-xl scale-110 pulse-glow"></div>
                
                <!-- Mascot Image -->
                <img src="{{ asset('storage/mascot.png') }}" 
                     alt="Karakter Mahasiswa" 
                     class="w-52 md:w-64 relative z-10 mascot-glow">
                
                <!-- Decorative Elements -->
                <div class="absolute -top-4 -right-4 w-6 h-6 bg-red-400 rounded-full opacity-60 pulse-glow"></div>
                <div class="absolute -bottom-2 -left-2 w-4 h-4 bg-red-500 rounded-full opacity-40 pulse-glow" style="animation-delay: 1s;"></div>
                <div class="absolute top-1/2 -left-6 w-3 h-3 bg-red-300 rounded-full opacity-50 pulse-glow" style="animation-delay: 2s;"></div>
            </div>
        </div>
    </div>

    <!-- Footer Decoration -->
    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-red-500 to-transparent opacity-50"></div>
</div>
@endsection