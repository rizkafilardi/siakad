<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SIAKAD Untad</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        
        .floating-particles {
            position: fixed;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
            pointer-events: none;
        }
        
        .particle {
            position: absolute;
            background: linear-gradient(45deg, #fbbf24, #f59e0b, #d97706);
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
        
        .premium-input {
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.6), rgba(30, 41, 59, 0.4));
            border: 1px solid rgba(71, 85, 105, 0.3);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .premium-input::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, #fbbf24, #f59e0b, #d97706);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }
        
        .premium-input:focus::before {
            transform: scaleX(1);
        }
        
        .premium-input:focus {
            border-color: rgba(251, 191, 36, 0.5);
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.8), rgba(30, 41, 59, 0.6));
            box-shadow: 0 0 20px rgba(251, 191, 36, 0.2);
        }
        
        .floating-logo {
            animation: float-logo 6s ease-in-out infinite;
        }
        
        @keyframes float-logo {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-10px) rotate(2deg); }
            66% { transform: translateY(-5px) rotate(-2deg); }
        }
        
        .premium-button {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #fbbf24, #f59e0b, #d97706);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 10px 25px rgba(251, 191, 36, 0.3);
        }
        
        .premium-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }
        
        .premium-button:hover::before {
            left: 100%;
        }
        
        .premium-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(251, 191, 36, 0.4);
            background: linear-gradient(135deg, #fcd34d, #fbbf24, #f59e0b);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #fbbf24, #f59e0b, #d97706, #92400e);
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
            background: #fbbf24;
            border-radius: 50%;
            animation: sparkle 2s infinite;
        }
        
        @keyframes sparkle {
            0%, 100% { opacity: 0; transform: scale(0); }
            50% { opacity: 1; transform: scale(1); }
        }
        
        .sparkle:nth-child(1) { top: 20%; left: 20%; animation-delay: 0s; }
        .sparkle:nth-child(2) { top: 30%; right: 25%; animation-delay: 0.5s; }
        .sparkle:nth-child(3) { bottom: 25%; left: 30%; animation-delay: 1s; }
        .sparkle:nth-child(4) { bottom: 20%; right: 20%; animation-delay: 1.5s; }
        
        .luxury-border {
            background: linear-gradient(45deg, #fbbf24, #f59e0b, #d97706, #92400e);
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
    </style>
</head>
<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 relative overflow-x-hidden">
    
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
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-yellow-400/20 to-orange-600/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-gradient-to-tr from-amber-400/20 to-yellow-600/20 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-gradient-to-r from-orange-400/10 to-red-600/10 rounded-full blur-3xl"></div>
    </div>

    <!-- Main Content -->
    <div class="relative z-10 min-h-screen py-8 px-4">
        <div class="w-full max-w-6xl mx-auto">
            <div class="luxury-border">
                <div class="content-inner p-8 md:p-12">
                    <div class="glass-card rounded-2xl p-8 md:p-12">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                            
                            <!-- Left Side - Logo and Illustration -->
                            <div class="text-center lg:text-left relative">
                                <!-- Sparkles -->
                                <div class="sparkle"></div>
                                <div class="sparkle"></div>
                                <div class="sparkle"></div>
                                <div class="sparkle"></div>
                                
                                <div class="floating-logo mb-8">
                                    <div class="luxury-border inline-block mb-6">
                                        <div class="bg-gradient-to-br from-slate-800 to-slate-900 p-4 rounded-full">
                                            <img src="{{ asset('storage/logo-untad.png') }}" alt="Logo Untad" class="w-20 h-20 object-contain">
                                        </div>
                                    </div>
                                    
                                    <h1 class="text-4xl md:text-5xl font-bold mb-4">
                                        <span class="gradient-text">SIAKAD</span>
                                        <br>
                                        <span class="text-white">UNTAD</span>
                                    </h1>
                                    
                                    <p class="text-gray-300 text-lg font-light mb-8">
                                        Sistem Informasi Akademik<br>
                                        <span class="text-yellow-400 font-medium">Universitas Tadulako</span>
                                    </p>
                                </div>
                                
                                <div class="hidden lg:block">
                                    <img src="{{ asset('storage/bg-login.png') }}" alt="Graduation" class="w-full max-w-md mx-auto opacity-80 floating-logo">
                                </div>
                            </div>

                            <!-- Right Side - Login Form -->
                            <div class="w-full">
                                <div class="mb-8">
                                    <h2 class="text-3xl font-bold text-white mb-2">Welcome Back!</h2>
                                    <p class="text-gray-300">Please sign in to your account</p>
                                    <div class="w-16 h-1 bg-gradient-to-r from-yellow-400 to-orange-500 mt-4 rounded-full"></div>
                                </div>

                                <form action="{{ route('auth.authenticate') }}" method="POST" class="space-y-6">
                                    @csrf

                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-gray-300 mb-2">
                                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                            Username
                                        </label>
                                        <input type="text" name="username" placeholder="Enter your username" 
                                               class="premium-input w-full px-4 py-4 rounded-xl text-white placeholder-gray-400 focus:outline-none relative" required>
                                        @error('username')
                                            <div class="text-red-400 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-gray-300 mb-2">
                                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                            </svg>
                                            Password
                                        </label>
                                        <input type="password" name="password" placeholder="Enter your password" 
                                               class="premium-input w-full px-4 py-4 rounded-xl text-white placeholder-gray-400 focus:outline-none relative" required>
                                    </div>

                                    <button type="submit" class="premium-button w-full py-4 text-slate-900 font-bold text-lg rounded-xl transition-all duration-300 flex items-center justify-center gap-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                        </svg>
                                        Sign In
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer Section -->
        <div class="mt-12 text-center text-gray-400">
            <p class="text-sm">© 2025 SIAKAD Universitas Tadulako. All rights reserved.</p>
            <p class="text-xs mt-2">Powered by Premium Technology</p>
        </div>
    </div>
</body>
</html>