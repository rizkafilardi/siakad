@extends('layouts.mahasiswa')

@section('content')
<style>
.edit-container {
    max-width: 500px;
    margin: 0 auto;
    padding: 1.5rem;
}

.edit-card {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(255, 255, 255, 0.9) 100%);
    backdrop-filter: blur(15px);
    border-radius: 16px;
    box-shadow: 0 15px 35px rgba(236, 72, 153, 0.1), 0 0 0 1px rgba(236, 72, 153, 0.1);
    padding: 2rem;
    border: 1px solid rgba(236, 72, 153, 0.15);
}

.edit-header {
    text-align: center;
    margin-bottom: 2rem;
    padding-bottom: 1.5rem;
    border-bottom: 1px solid rgba(236, 72, 153, 0.1);
}

.edit-title {
    font-size: 1.875rem;
    font-weight: 700;
    background: linear-gradient(135deg, #ec4899, #db2777);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 0.5rem;
}

.edit-subtitle {
    color: #64748b;
    font-size: 1rem;
    font-weight: 500;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-label {
    display: block;
    font-weight: 600;
    color: #1e293b;
    margin-bottom: 0.5rem;
    font-size: 0.875rem;
}

.form-input {
    color: #1e293b;
    background: rgba(255, 255, 255, 0.8);
    width: 100%;
    padding: 0.75rem 1rem;
    border: 1px solid rgba(236, 72, 153, 0.2);
    border-radius: 12px;
    font-size: 0.875rem;
    font-weight: 500;
    transition: all 0.2s ease;
    box-sizing: border-box;
}

.form-input:focus {
    outline: none;
    border-color: #ec4899;
    box-shadow: 0 0 0 3px rgba(236, 72, 153, 0.1);
}

.form-input.error {
    border-color: #dc2626;
    box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
}

.password-group {
    position: relative;
}

.password-toggle {
    position: absolute;
    right: 0.75rem;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: #ec4899;
    cursor: pointer;
    padding: 0.25rem;
    border-radius: 6px;
    transition: all 0.2s;
}

.password-toggle:hover {
    background: rgba(236, 72, 153, 0.1);
}

.error-message {
    color: #dc2626;
    font-size: 0.75rem;
    font-weight: 600;
    margin-top: 0.5rem;
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

.form-actions {
    display: flex;
    gap: 1rem;
    margin-top: 2rem;
}

.btn {
    flex: 1;
    padding: 0.75rem 1.5rem;
    border-radius: 12px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    transition: all 0.2s ease;
    border: none;
    cursor: pointer;
    font-size: 0.875rem;
}

.btn-primary {
    background: linear-gradient(135deg, #ec4899, #db2777);
    color: white;
    box-shadow: 0 4px 12px rgba(236, 72, 153, 0.3);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(236, 72, 153, 0.4);
}

.btn-secondary {
    background: rgba(248, 250, 252, 0.8);
    color: #475569;
    border: 1px solid rgba(236, 72, 153, 0.2);
}

.btn-secondary:hover {
    background: rgba(236, 72, 153, 0.05);
    border-color: rgba(236, 72, 153, 0.3);
    text-decoration: none;
    color: #ec4899;
}

.icon {
    width: 1rem;
    height: 1rem;
}

@media (max-width: 640px) {
    .form-actions {
        flex-direction: column;
    }

    .edit-card {
        padding: 1.5rem;
    }

    .edit-title {
        font-size: 1.5rem;
    }
}
</style>

<div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 py-8">
    <div class="edit-container">
        <div class="edit-card">
            <!-- Header -->
            <div class="edit-header">
                <h1 class="edit-title">Edit Profil</h1>
                <p class="edit-subtitle">Perbarui informasi akun Anda</p>
            </div>

            <!-- Edit Form -->
            <form action="{{ route('mahasiswa.profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Username -->
                <div class="form-group">
                    <label for="username" class="form-label">Username</label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        value="{{ old('username', $user->username) }}" 
                        class="form-input @error('username') error @enderror"
                        required
                    >
                    @error('username')
                        <div class="error-message">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        value="{{ old('email', $user->email) }}" 
                        class="form-input @error('email') error @enderror"
                        required
                    >
                    @error('email')
                        <div class="error-message">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Current Password -->
                <div class="form-group">
                    <label for="current_password" class="form-label">Password Saat Ini (opsional)</label>
                    <div class="password-group">
                        <input 
                            type="password" 
                            id="current_password" 
                            name="current_password" 
                            class="form-input @error('current_password') error @enderror"
                            placeholder="Kosongkan jika tidak ingin mengubah password"
                        >
                        <button type="button" class="password-toggle" onclick="togglePassword('current_password')">
                            <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </button>
                    </div>
                    @error('current_password')
                        <div class="error-message">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- New Password -->
                <div class="form-group">
                    <label for="new_password" class="form-label">Password Baru (opsional)</label>
                    <div class="password-group">
                        <input 
                            type="password" 
                            id="new_password" 
                            name="new_password" 
                            class="form-input @error('new_password') error @enderror"
                            placeholder="Masukkan password baru"
                        >
                        <button type="button" class="password-toggle" onclick="togglePassword('new_password')">
                            <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 616 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </button>
                    </div>
                    @error('new_password')
                        <div class="error-message">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="new_password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                    <div class="password-group">
                        <input 
                            type="password" 
                            id="new_password_confirmation" 
                            name="new_password_confirmation" 
                            class="form-input"
                            placeholder="Konfirmasi password baru"
                        >
                        <button type="button" class="password-toggle" onclick="togglePassword('new_password_confirmation')">
                            <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('mahasiswa.profile.index') }}" class="btn btn-secondary">
                        <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function togglePassword(fieldId) {
    const field = document.getElementById(fieldId);
    const button = field.nextElementSibling;
    
    if (field.type === 'password') {
        field.type = 'text';
        button.innerHTML = `
            <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-2.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L8.464 8.464M9.878 9.878a3 3 0 00-.007 4.243m5.036-5.036a3 3 0 00-5.036 5.036m0 0L8.464 15.536m11.314-11.314L15.536 8.464"></path>
            </svg>
        `;
    } else {
        field.type = 'password';
        button.innerHTML = `
            <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 616 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
            </svg>
        `;
    }
}
</script>

@endsection