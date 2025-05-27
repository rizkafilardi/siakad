@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap');
    
    .premium-container {
        font-family: 'Nunito', sans-serif;
        background: linear-gradient(135deg, #fdf2f8 0%, #fce7f3 25%, #fbcfe8 50%, #fce7f3 75%, #fdf2f8 100%);
        min-height: 100vh;
        position: relative;
        overflow: hidden;
    }
    
    .floating-particles {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 1;
    }
    
    .particle {
        position: absolute;
        background: linear-gradient(45deg, #ec4899, #f472b6, #f9a8d4);
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
    
    .glass-card {
        backdrop-filter: blur(30px);
        background: linear-gradient(135deg, 
            rgba(255, 255, 255, 0.9) 0%, 
            rgba(255, 255, 255, 0.7) 50%, 
            rgba(255, 255, 255, 0.9) 100%);
        border: 2px solid rgba(236, 72, 153, 0.2);
        box-shadow: 
            0 30px 60px rgba(236, 72, 153, 0.15),
            0 0 0 1px rgba(255, 255, 255, 0.8) inset,
            0 4px 8px rgba(236, 72, 153, 0.1) inset;
    }
    
    .premium-card {
        position: relative;
        overflow: hidden;
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .premium-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(236, 72, 153, 0.2), transparent);
        transition: left 0.8s;
    }
    
    .premium-card:hover::before {
        left: 100%;
    }
    
    .premium-card:hover {
        transform: translateY(-12px) scale(1.03);
        box-shadow: 
            0 40px 80px rgba(236, 72, 153, 0.25),
            0 0 0 2px rgba(236, 72, 153, 0.4) inset,
            0 4px 8px rgba(236, 72, 153, 0.3) inset;
    }
    
    .gradient-text {
        background: linear-gradient(135deg, #ec4899, #f472b6, #be185d, #db2777);
        background-size: 400% 400%;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: gradient-shift 4s ease-in-out infinite;
    }
    
    @keyframes gradient-shift {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }
    
    .floating-avatar {
        animation: float-avatar 8s ease-in-out infinite;
        position: relative;
    }
    
    @keyframes float-avatar {
        0%, 100% { transform: translateY(0px) rotate(0deg) scale(1); }
        25% { transform: translateY(-15px) rotate(3deg) scale(1.05); }
        50% { transform: translateY(-8px) rotate(-2deg) scale(1.02); }
        75% { transform: translateY(-12px) rotate(1deg) scale(1.03); }
    }
    
    .premium-button {
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, #ec4899, #db2777, #be185d);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 15px 35px rgba(236, 72, 153, 0.4);
    }
    
    .premium-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.6s;
    }
    
    .premium-button:hover::before {
        left: 100%;
    }
    
    .premium-button:hover {
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 20px 45px rgba(236, 72, 153, 0.5);
        background: linear-gradient(135deg, #f472b6, #ec4899, #db2777);
    }
    
    .info-field {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.7));
        border: 2px solid rgba(236, 72, 153, 0.2);
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
    }
    
    .info-field::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #ec4899, #f472b6, #db2777);
        transform: scaleX(0);
        transition: transform 0.4s ease;
    }
    
    .info-field:hover::before {
        transform: scaleX(1);
    }
    
    .info-field:hover {
        border-color: rgba(236, 72, 153, 0.6);
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.85));
        transform: translateX(8px) scale(1.02);
        box-shadow: 0 10px 25px rgba(236, 72, 153, 0.2);
    }
    
    .crown-icon {
        color: #f59e0b;
        filter: drop-shadow(0 0 15px rgba(245, 158, 11, 0.6));
        animation: crown-glow 3s ease-in-out infinite alternate;
    }
    
    @keyframes crown-glow {
        0% { filter: drop-shadow(0 0 15px rgba(245, 158, 11, 0.6)) scale(1); }
        100% { filter: drop-shadow(0 0 25px rgba(245, 158, 11, 0.9)) scale(1.1); }
    }
    
    .status-indicator {
        position: relative;
    }
    
    .status-indicator::before {
        content: '';
        position: absolute;
        top: 50%;
        left: -20px;
        transform: translateY(-50%);
        width: 10px;
        height: 10px;
        background: #ec4899;
        border-radius: 50%;
        animation: pulse-dot 2.5s infinite;
        box-shadow: 0 0 10px rgba(236, 72, 153, 0.5);
    }
    
    @keyframes pulse-dot {
        0%, 100% { opacity: 1; transform: translateY(-50%) scale(1); }
        50% { opacity: 0.6; transform: translateY(-50%) scale(1.3); }
    }
    
    .luxury-border {
        background: linear-gradient(45deg, #ec4899, #f472b6, #db2777, #be185d);
        background-size: 400% 400%;
        animation: border-flow 5s ease-in-out infinite;
        padding: 3px;
        border-radius: 28px;
    }
    
    @keyframes border-flow {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }
    
    .content-inner {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.9));
        border-radius: 25px;
        padding: 2.5rem;
    }
    
    .diamond-sparkle {
        position: absolute;
        width: 6px;
        height: 6px;
        background: linear-gradient(45deg, #ec4899, #f472b6);
        border-radius: 50%;
        animation: sparkle 3s infinite;
        box-shadow: 0 0 10px rgba(236, 72, 153, 0.5);
    }
    
    @keyframes sparkle {
        0%, 100% { opacity: 0; transform: scale(0) rotate(0deg); }
        50% { opacity: 1; transform: scale(1.2) rotate(180deg); }
    }
    
    .diamond-sparkle:nth-child(1) { top: 15%; left: 15%; animation-delay: 0s; }
    .diamond-sparkle:nth-child(2) { top: 25%; right: 20%; animation-delay: 0.7s; }
    .diamond-sparkle:nth-child(3) { bottom: 20%; left: 25%; animation-delay: 1.4s; }
    .diamond-sparkle:nth-child(4) { bottom: 15%; right: 15%; animation-delay: 2.1s; }
    
    .edit-button {
        background: linear-gradient(135deg, #3b82f6, #1d4ed8);
        transition: all 0.3s ease;
        box-shadow: 0 8px 20px rgba(59, 130, 246, 0.3);
    }
    
    .edit-button:hover {
        transform: translateY(-2px) scale(1.05);
        box-shadow: 0 12px 30px rgba(59, 130, 246, 0.4);
        background: linear-gradient(135deg, #60a5fa, #3b82f6);
    }
    
    .magical-glow {
        position: relative;
    }
    
    .magical-glow::after {
        content: '';
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        background: linear-gradient(45deg, #ec4899, #f472b6, #db2777, #be185d);
        border-radius: inherit;
        z-index: -1;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .magical-glow:hover::after {
        opacity: 0.7;
        animation: magical-pulse 1.5s infinite;
    }
    
    @keyframes magical-pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }
</style>

<div class="premium-container">
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
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-gradient-to-br from-pink-300/30 to-rose-400/30 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-tr from-fuchsia-300/30 to-pink-500/30 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-72 h-72 bg-gradient-to-r from-rose-300/20 to-pink-400/20 rounded-full blur-3xl"></div>
    </div>

    <div class="relative z-10 min-h-screen flex items-center justify-center p-6">
        <div class="w-full max-w-3xl">
            <!-- Header Section -->
            <div class="text-center mb-16">
                <div class="floating-avatar inline-block mb-8 relative">
                    <!-- Diamond Sparkles -->
                    <div class="diamond-sparkle"></div>
                    <div class="diamond-sparkle"></div>
                    <div class="diamond-sparkle"></div>
                    <div class="diamond-sparkle"></div>
                    
                    <div class="luxury-border magical-glow">
                        <div class="w-40 h-40 bg-gradient-to-br from-pink-400 via-rose-500 to-pink-600 rounded-full flex items-center justify-center text-7xl relative overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-br from-white/30 to-transparent"></div>
                            <span class="relative z-10">👤</span>
                            <div class="absolute -top-3 -right-3">
                                <svg class="w-10 h-10 crown-icon" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M5 16L3 6l5.5 4L12 4l3.5 6L21 6l-2 10H5zm2.7-2h8.6l.9-4.4L14 12l-2-3.4L10 12l-3.2-2.4L7.7 14z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                
                <h1 class="text-6xl font-bold mb-6">
                    <span class="gradient-text">User Profile</span>
                </h1>
                <p class="text-2xl text-gray-600 font-light">Premium Account Dashboard</p>
                <div class="w-32 h-1.5 bg-gradient-to-r from-pink-400 to-rose-500 mx-auto mt-6 rounded-full"></div>
            </div>

            <!-- Main Profile Card -->
            <div class="luxury-border mb-10 magical-glow">
                <div class="content-inner">
                    <div class="glass-card premium-card rounded-3xl p-10 space-y-10">
                        <!-- Name Field -->
                        <div class="space-y-4">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-pink-500 to-rose-600 rounded-2xl flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-800">Name</h3>
                            </div>
                            <div class="info-field px-8 py-5 rounded-2xl">
                                <div class="status-indicator text-xl font-semibold text-gray-800 pl-8">
                                    {{ $user->username }}
                                </div>
                            </div>
                        </div>

                        <!-- Email Field -->
                        <div class="space-y-4">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-800">Email</h3>
                            </div>
                            <div class="info-field px-8 py-5 rounded-2xl">
                                <div class="status-indicator text-xl font-semibold text-gray-800 pl-8">
                                    {{ $user->email }}
                                </div>
                            </div>
                        </div>

                        <!-- Role Field -->
                        <div class="space-y-4">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-violet-600 rounded-2xl flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-800">Role</h3>
                            </div>
                            <div class="info-field px-8 py-5 rounded-2xl">
                                <div class="status-indicator text-xl font-semibold text-gray-800 pl-8 capitalize">
                                    {{ $user->role }}
                                </div>
                            </div>
                        </div>

                        <!-- Status Indicators -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-8">
                            <div class="glass-card rounded-2xl p-6 text-center magical-glow">
                                <div class="w-16 h-16 bg-gradient-to-br from-emerald-400 to-green-500 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <p class="text-emerald-600 font-bold text-lg">Active</p>
                                <p class="text-gray-500 text-sm">Account Status</p>
                            </div>
                            
                            <div class="glass-card rounded-2xl p-6 text-center magical-glow">
                                <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                </div>
                                <p class="text-blue-600 font-bold text-lg">Secured</p>
                                <p class="text-gray-500 text-sm">Data Protection</p>
                            </div>
                            
                            <div class="glass-card rounded-2xl p-6 text-center magical-glow">
                                <div class="w-16 h-16 bg-gradient-to-br from-purple-400 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                                <p class="text-purple-600 font-bold text-lg">Premium</p>
                                <p class="text-gray-500 text-sm">Access Level</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 items-center justify-center">
                <a href="{{ route('admin.profile.edit') }}"
                    class="edit-button inline-flex items-center gap-3 text-white font-bold px-8 py-4 rounded-2xl shadow-lg transition-all duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Edit Account
                </a>

                <form action="{{ route('auth.logout') }}" method="POST" class="inline-block">
                    @csrf
                    @method('delete')
                    <button type="submit" class="premium-button px-10 py-4 rounded-2xl text-white font-bold text-lg flex items-center gap-4 transition-all duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
            
            <p class="text-gray-500 text-center mt-6">
                Session will be securely terminated
            </p>
        </div>
    </div>
</div>
@endsection
