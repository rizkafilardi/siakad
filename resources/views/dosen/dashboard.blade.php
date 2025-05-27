@extends('layouts.dosen')

@section('content')
<div class="min-h-screen p-8 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900">
    <!-- Header Section -->
    <div class="mb-12">
        <div class="glass-effect rounded-3xl p-8 shadow-2xl shadow-pink-500/10 border border-pink-500/20 backdrop-blur-xl">
            <div class="flex items-center justify-between">
                <div class="flex-1">
                    <div class="flex items-center gap-6 mb-6">
                        <div class="relative">
                            <div class="w-20 h-20 bg-gradient-to-br from-pink-400 via-pink-500 to-pink-600 rounded-2xl flex items-center justify-center shadow-2xl shadow-pink-500/30 transform rotate-3 hover:rotate-0 transition-transform duration-300">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="absolute -top-2 -right-2 w-6 h-6 bg-gradient-to-br from-pink-300 to-pink-400 rounded-full animate-bounce"></div>
                        </div>
                        <div>
                            <h1 class="text-5xl font-extrabold bg-gradient-to-r from-pink-300 via-pink-400 to-rose-400 bg-clip-text text-transparent leading-tight">
                                Selamat Datang
                            </h1>
                            <p class="text-3xl font-bold text-transparent bg-gradient-to-r from-pink-200 to-pink-300 bg-clip-text mt-2">
                                [ <span class="font-black tracking-wide">{{$user->username}}</span> ]
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-3 h-3 bg-gradient-to-r from-pink-400 to-pink-500 rounded-full animate-pulse"></div>
                        <p class="text-slate-200 font-semibold text-lg tracking-wide">Tahun Ajaran 2025/2026</p>
                        <div class="w-3 h-3 bg-gradient-to-r from-pink-400 to-pink-500 rounded-full animate-pulse delay-500"></div>
                    </div>

                    <!-- Stats Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10">
                        <div class="group cursor-pointer transform hover:scale-105 transition-all duration-300">
                            <div class="glass-effect rounded-2xl p-8 border border-pink-500/30 hover:border-pink-400/50 transition-all duration-300 hover:shadow-xl hover:shadow-pink-500/20 bg-gradient-to-br from-pink-500/5 to-pink-600/10">
                                <div class="flex items-center gap-6">
                                    <div class="w-16 h-16 bg-gradient-to-br from-pink-400 to-pink-600 rounded-2xl flex items-center justify-center shadow-xl shadow-pink-500/30 group-hover:rotate-12 transition-transform duration-300">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-pink-200 font-bold text-xl mb-1">Jumlah Mahasiswa</h3>
                                        <p class="text-slate-400 text-sm font-medium">Data terkini semester ini</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="group cursor-pointer transform hover:scale-105 transition-all duration-300">
                            <div class="glass-effect rounded-2xl p-8 border border-pink-500/30 hover:border-pink-400/50 transition-all duration-300 hover:shadow-xl hover:shadow-pink-500/20 bg-gradient-to-br from-pink-500/5 to-pink-600/10">
                                <div class="flex items-center gap-6">
                                    <div class="w-16 h-16 bg-gradient-to-br from-pink-400 to-pink-600 rounded-2xl flex items-center justify-center shadow-xl shadow-pink-500/30 group-hover:rotate-12 transition-transform duration-300">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-pink-200 font-bold text-xl mb-1">Jumlah Dosen</h3>
                                        <p class="text-slate-400 text-sm font-medium">Tenaga pengajar aktif</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Inspirational Quote -->
                    <div class="relative bg-gradient-to-r from-pink-500/10 to-rose-500/10 rounded-2xl p-8 border border-pink-500/20">
                        <div class="absolute -left-2 -top-4 text-8xl text-pink-400/30 font-serif leading-none">"</div>
                        <blockquote class="text-xl font-medium italic text-slate-200 leading-relaxed pl-12 pr-8 relative z-10">
                            <span class="bg-gradient-to-r from-pink-200 to-rose-200 bg-clip-text text-transparent">
                                Setiap ilmu yang Ibu/Bapak ajarkan hari ini,<br>
                                adalah cahaya yang akan menerangi masa depan banyak generasi.
                            </span>
                        </blockquote>
                        <div class="absolute -right-2 -bottom-4 text-8xl text-pink-400/30 font-serif leading-none">"</div>
                    </div>
                </div>

                <!-- Mascot Image -->
                <div class="flex-shrink-0 relative">
                    <div class="relative">
                        <!-- Decorative elements -->
                        <div class="absolute -top-6 -right-6 w-12 h-12 bg-gradient-to-br from-pink-400 to-pink-500 rounded-full opacity-70 animate-pulse"></div>
                        <div class="absolute -bottom-6 -left-6 w-8 h-8 bg-gradient-to-br from-rose-400 to-pink-500 rounded-full opacity-50 animate-pulse delay-1000"></div>
                        <div class="absolute top-1/2 -left-8 w-6 h-6 bg-gradient-to-br from-pink-300 to-pink-400 rounded-full opacity-60 animate-bounce delay-500"></div>
                        
                        <!-- Image container -->
                        <div class="relative p-6">
                            <div class="absolute inset-0 bg-gradient-to-br from-pink-400/20 to-rose-500/20 rounded-full opacity-50 blur-2xl animate-pulse"></div>
                            <img src="{{ asset('storage/mascot.png') }}" alt="Karakter Mahasiswa" class="relative w-72 md:w-96 drop-shadow-2xl transform hover:scale-105 transition-transform duration-300">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- System Status - Full Width -->
    <div class="w-full max-w-6xl mx-auto">
        <div class="glass-effect rounded-3xl p-10 border border-pink-500/20 shadow-2xl shadow-pink-500/10 backdrop-blur-xl">
            <div class="flex items-center gap-4 mb-10">
                <div class="w-14 h-14 bg-gradient-to-br from-pink-400 to-pink-600 rounded-2xl flex items-center justify-center shadow-xl shadow-pink-500/30">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-3xl font-bold bg-gradient-to-r from-pink-300 to-pink-400 bg-clip-text text-transparent">Status Sistem</h3>
                <div class="flex-1 h-px bg-gradient-to-r from-pink-500/50 via-pink-400/30 to-transparent ml-6"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mb-10">
                <!-- Server Status -->
                <div class="text-center group">
                    <div class="w-20 h-20 mx-auto mb-6 rounded-2xl bg-gradient-to-br from-emerald-400 to-emerald-600 flex items-center justify-center shadow-xl shadow-emerald-500/30 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/>
                        </svg>
                    </div>
                    <h4 class="text-2xl font-bold text-white mb-3">Server</h4>
                    <div class="flex items-center justify-center gap-3 mb-4">
                        <div class="w-4 h-4 bg-emerald-400 rounded-full animate-pulse shadow-lg shadow-emerald-400/50"></div>
                        <span class="text-emerald-400 font-bold text-lg">Online</span>
                    </div>
                    <p class="text-slate-300 text-sm font-medium mb-1">Uptime: 99.9%</p>
                    <p class="text-slate-400 text-sm">Last Check: 2 min ago</p>
                </div>

                <!-- Database Status -->
                <div class="text-center group">
                    <div class="w-20 h-20 mx-auto mb-6 rounded-2xl bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center shadow-xl shadow-blue-500/30 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/>
                        </svg>
                    </div>
                    <h4 class="text-2xl font-bold text-white mb-3">Database</h4>
                    <div class="flex items-center justify-center gap-3 mb-4">
                        <div class="w-4 h-4 bg-emerald-400 rounded-full animate-pulse shadow-lg shadow-emerald-400/50"></div>
                        <span class="text-emerald-400 font-bold text-lg">Aktif</span>
                    </div>
                    <p class="text-slate-300 text-sm font-medium mb-1">Connections: 45/100</p>
                    <p class="text-slate-400 text-sm">Response: 12ms</p>
                </div>

                <!-- Backup Status -->
                <div class="text-center group">
                    <div class="w-20 h-20 mx-auto mb-6 rounded-2xl bg-gradient-to-br from-amber-400 to-orange-500 flex items-center justify-center shadow-xl shadow-amber-500/30 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"/>
                        </svg>
                    </div>
                    <h4 class="text-2xl font-bold text-white mb-3">Backup</h4>
                    <div class="flex items-center justify-center gap-3 mb-4">
                        <div class="w-4 h-4 bg-amber-400 rounded-full animate-pulse shadow-lg shadow-amber-400/50"></div>
                        <span class="text-amber-400 font-bold text-lg">Terjadwal</span>
                    </div>
                    <p class="text-slate-300 text-sm font-medium mb-1">Next: Tonight 02:00</p>
                    <p class="text-slate-400 text-sm">Last: 24 hours ago</p>
                </div>
            </div>

            <!-- Additional System Info -->
            <div class="mt-10 pt-8 border-t border-slate-700/50">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                    <div class="group">
                        <p class="text-3xl font-black bg-gradient-to-r from-pink-300 to-pink-400 bg-clip-text text-transparent mb-2 group-hover:scale-110 transition-transform duration-300">24/7</p>
                        <p class="text-slate-300 text-sm font-semibold">Monitoring</p>
                    </div>
                    <div class="group">
                        <p class="text-3xl font-black bg-gradient-to-r from-pink-300 to-pink-400 bg-clip-text text-transparent mb-2 group-hover:scale-110 transition-transform duration-300">256-bit</p>
                        <p class="text-slate-300 text-sm font-semibold">Encryption</p>
                    </div>
                    <div class="group">
                        <p class="text-3xl font-black bg-gradient-to-r from-pink-300 to-pink-400 bg-clip-text text-transparent mb-2 group-hover:scale-110 transition-transform duration-300">99.9%</p>
                        <p class="text-slate-300 text-sm font-semibold">Uptime</p>
                    </div>
                    <div class="group">
                        <p class="text-3xl font-black bg-gradient-to-r from-pink-300 to-pink-400 bg-clip-text text-transparent mb-2 group-hover:scale-110 transition-transform duration-300">ISO 27001</p>
                        <p class="text-slate-300 text-sm font-semibold">Certified</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection