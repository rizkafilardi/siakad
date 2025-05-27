@extends('layouts.mahasiswa')

@section('content')
<style>
.dashboard-container {
    font-family: 'Inter', sans-serif;
}

.glass-card {
    backdrop-filter: blur(15px);
    background: linear-gradient(135deg, 
        rgba(255, 255, 255, 0.1) 0%, 
        rgba(255, 255, 255, 0.05) 50%, 
        rgba(236, 72, 153, 0.05) 100%);
    border: 1px solid rgba(255, 255, 255, 0.15);
    box-shadow: 0 15px 35px rgba(236, 72, 153, 0.15);
}

.dashboard-card {
    transition: all 0.3s ease;
}

.dashboard-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(236, 72, 153, 0.2);
}

.gradient-text {
    background: linear-gradient(135deg, #ec4899, #db2777);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    font-weight: 700;
}

.dashboard-button {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(248, 250, 252, 0.8));
    transition: all 0.3s ease;
    box-shadow: 0 8px 20px rgba(236, 72, 153, 0.15);
    border: 1px solid rgba(236, 72, 153, 0.2);
    backdrop-filter: blur(10px);
}

.dashboard-button:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 25px rgba(236, 72, 153, 0.25);
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(248, 250, 252, 0.9));
    border-color: rgba(236, 72, 153, 0.3);
}

.quote-card {
    background: linear-gradient(135deg, rgba(236, 72, 153, 0.1), rgba(219, 39, 119, 0.05));
    border: 1px solid rgba(236, 72, 153, 0.2);
    backdrop-filter: blur(10px);
}

.year-badge {
    background: linear-gradient(135deg, #ec4899, #db2777);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 25px;
    font-size: 0.75rem;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    box-shadow: 0 4px 12px rgba(236, 72, 153, 0.3);
}

.button-icon-bg {
    background: linear-gradient(135deg, #ec4899, #db2777);
    box-shadow: 0 4px 12px rgba(236, 72, 153, 0.25);
}

.button-text-primary {
    color: #be185d;
    font-weight: 700;
}

.button-text-secondary {
    color: #6b7280;
    font-weight: 500;
}

.mascot-container {
    position: relative;
    display: inline-block;
}

.mascot-glow {
    filter: drop-shadow(0 0 15px rgba(236, 72, 153, 0.3));
    transition: filter 0.3s ease;
}

.mascot-glow:hover {
    filter: drop-shadow(0 0 20px rgba(236, 72, 153, 0.4));
}

@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');

.premium-container {
    font-family: 'Inter', sans-serif;
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
    background: linear-gradient(45deg, #ec4899, #db2777, #be185d);
    border-radius: 50%;
    animation: float-particle 20s infinite linear;
    opacity: 0.15;
}

.particle:nth-child(1) { width: 6px; height: 6px; left: 10%; animation-delay: 0s; }
.particle:nth-child(2) { width: 8px; height: 8px; left: 20%; animation-delay: 3s; }
.particle:nth-child(3) { width: 4px; height: 4px; left: 30%; animation-delay: 6s; }
.particle:nth-child(4) { width: 7px; height: 7px; left: 40%; animation-delay: 9s; }
.particle:nth-child(5) { width: 5px; height: 5px; left: 50%; animation-delay: 12s; }
.particle:nth-child(6) { width: 9px; height: 9px; left: 60%; animation-delay: 15s; }
.particle:nth-child(7) { width: 4px; height: 4px; left: 70%; animation-delay: 18s; }
.particle:nth-child(8) { width: 6px; height: 6px; left: 80%; animation-delay: 21s; }
.particle:nth-child(9) { width: 5px; height: 5px; left: 90%; animation-delay: 24s; }

@keyframes float-particle {
    0% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
    10% { opacity: 0.15; }
    90% { opacity: 0.15; }
    100% { transform: translateY(-100vh) rotate(360deg); opacity: 0; }
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
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.15), transparent);
    transition: left 0.6s;
}

.premium-card:hover::before {
    left: 100%;
}

.premium-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 
        0 35px 70px rgba(236, 72, 153, 0.3),
        0 0 0 1px rgba(236, 72, 153, 0.3) inset,
        0 2px 4px rgba(236, 72, 153, 0.2) inset;
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
    33% { transform: translateY(-20px) rotate(3deg); }
    66% { transform: translateY(-10px) rotate(-3deg); }
}

.premium-button {
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(248, 250, 252, 0.8), rgba(236, 72, 153, 0.1));
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 15px 35px rgba(236, 72, 153, 0.2);
    border: 2px solid rgba(236, 72, 153, 0.2);
    backdrop-filter: blur(20px);
}

.premium-button::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(236, 72, 153, 0.15), transparent);
    transition: left 0.5s;
}

.premium-button:hover::before {
    left: 100%;
}

.premium-button:hover {
    transform: translateY(-5px) scale(1.05);
    box-shadow: 0 25px 50px rgba(236, 72, 153, 0.4);
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(248, 250, 252, 0.9), rgba(236, 72, 153, 0.15));
    border-color: rgba(236, 72, 153, 0.4);
}

.sparkle {
    position: absolute;
    width: 6px;
    height: 6px;
    background: linear-gradient(45deg, #ec4899, #db2777);
    border-radius: 50%;
    animation: sparkle 2s infinite;
    box-shadow: 0 0 10px rgba(236, 72, 153, 0.5);
}

@keyframes sparkle {
    0%, 100% { opacity: 0; transform: scale(0) rotate(0deg); }
    50% { opacity: 1; transform: scale(1) rotate(180deg); }
}

.sparkle:nth-child(1) { top: 15%; left: 15%; animation-delay: 0s; }
.sparkle:nth-child(2) { top: 25%; right: 20%; animation-delay: 0.5s; }
.sparkle:nth-child(3) { bottom: 20%; left: 25%; animation-delay: 1s; }
.sparkle:nth-child(4) { bottom: 15%; right: 15%; animation-delay: 1.5s; }
.sparkle:nth-child(5) { top: 50%; left: 10%; animation-delay: 2s; }
.sparkle:nth-child(6) { top: 60%; right: 30%; animation-delay: 2.5s; }

.luxury-border {
    background: linear-gradient(45deg, #ec4899, #db2777, #be185d, #a21caf);
    background-size: 300% 300%;
    animation: border-flow 4s ease-in-out infinite;
    padding: 4px;
    border-radius: 32px;
}

@keyframes border-flow {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}

.content-inner {
    background: linear-gradient(135deg, rgba(15, 23, 42, 0.95), rgba(30, 41, 59, 0.9));
    border-radius: 28px;
}

.pulse-glow {
    animation: pulse-glow 2s ease-in-out infinite alternate;
}

@keyframes pulse-glow {
    0% { 
        box-shadow: 0 0 25px rgba(236, 72, 153, 0.4);
        filter: drop-shadow(0 0 15px rgba(236, 72, 153, 0.4));
    }
    100% { 
        box-shadow: 0 0 50px rgba(236, 72, 153, 0.7);
        filter: drop-shadow(0 0 25px rgba(236, 72, 153, 0.7));
    }
}

.quote-card {
    background: linear-gradient(135deg, rgba(236, 72, 153, 0.1), rgba(219, 39, 119, 0.05));
    border: 1px solid rgba(236, 72, 153, 0.2);
    backdrop-filter: blur(10px);
}

.quote-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 6px;
    height: 100%;
    background: linear-gradient(to bottom, #ec4899, #db2777, #be185d);
    animation: quote-line 3s ease-in-out infinite;
}

@keyframes quote-line {
    0%, 100% { transform: scaleY(1); opacity: 0.6; }
    50% { transform: scaleY(1.2); opacity: 1; }
}

.year-badge {
    background: linear-gradient(135deg, #ec4899, #db2777);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 25px;
    font-size: 0.75rem;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    box-shadow: 0 4px 12px rgba(236, 72, 153, 0.3);
    border: 2px solid rgba(255, 255, 255, 0.2);
}

@keyframes badge-pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.08); }
}

.mascot-glow {
    filter: drop-shadow(0 0 15px rgba(236, 72, 153, 0.3));
    transition: filter 0.3s ease;
}

.mascot-glow:hover {
    filter: drop-shadow(0 0 20px rgba(236, 72, 153, 0.4));
}

.welcome-connected {
    display: inline;
    line-height: 1.2;
}

.enhanced-title {
    font-size: clamp(2.5rem, 5vw, 4rem);
    font-weight: 900;
    letter-spacing: -0.02em;
}

.button-icon-bg {
    background: linear-gradient(135deg, #ec4899, #db2777);
    box-shadow: 0 4px 12px rgba(236, 72, 153, 0.25);
}

.button-text-primary {
    color: #be185d;
    font-weight: 700;
}

.button-text-secondary {
    color: #6b7280;
    font-weight: 500;
}
</style>

<div class="dashboard-container min-h-screen w-full bg-gradient-to-br from-gray-900 via-gray-800 to-pink-900 text-white p-6 flex flex-col justify-between rounded-r-xl relative">
    
    <!-- Background Gradient Orbs -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-20 -right-20 w-48 h-48 bg-gradient-to-br from-pink-400/20 to-pink-600/20 rounded-full blur-2xl"></div>
        <div class="absolute -bottom-20 -left-20 w-56 h-56 bg-gradient-to-tr from-pink-500/20 to-pink-700/20 rounded-full blur-2xl"></div>
    </div>

    <!-- Header Section -->
    <div class="relative z-10">
        <div class="bg-gray-800 rounded-2xl p-8 mb-8 border border-gray-700">
            <div class="glass-card dashboard-card rounded-2xl p-8">
                <!-- Welcome Message -->
                <div class="mb-8">
                    <h1 class="text-3xl md:text-4xl font-bold mb-4">
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
                    <button class="dashboard-button px-6 py-4 rounded-xl font-bold transition-all duration-300 flex items-center gap-3">
                        <div class="w-10 h-10 button-icon-bg rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                        </div>
                        <div class="text-left">
                            <div class="button-text-primary text-base">Jumlah Mahasiswa</div>
                            <div class="button-text-secondary text-sm">Data Terkini</div>
                        </div>
                    </button>
                    
                    <button class="dashboard-button px-6 py-4 rounded-xl font-bold transition-all duration-300 flex items-center gap-3">
                        <div class="w-10 h-10 button-icon-bg rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div class="text-left">
                            <div class="button-text-primary text-base">Jumlah Dosen</div>
                            <div class="button-text-secondary text-sm">Pengajar Aktif</div>
                        </div>
                    </button>
                </div>

                <!-- Inspirational Quote -->
                <div class="quote-card rounded-xl p-6">
                    <div class="flex items-start gap-4">
                        <div class="w-8 h-8 text-pink-400 flex-shrink-0 mt-1">
                            <svg fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h4v10h-10z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-200 italic leading-relaxed text-lg font-medium">
                                "Setiap ilmu yang Ibu/Bapak ajarkan hari ini,<br>
                                adalah cahaya yang akan menerangi masa depan banyak generasi."
                            </p>
                            <p class="text-pink-400 text-sm mt-4 font-bold">— Inspirasi Pendidik</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Decoration -->
    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-pink-500 to-transparent opacity-50"></div>
</div>
@endsection