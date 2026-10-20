<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar – Sistem Peminjaman Alat</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/tema-peminjaman-alat.css') }}">

    <style>
        /* Penyesuaian khusus halaman register, memakai variabel dari tema-peminjaman-alat.css */
        .register-card {
            background: #fff;
            border: 1px solid rgba(27, 36, 48, .12);
            border-top: 4px solid var(--amber);
            position: relative;
            overflow: hidden;
        }

        /* Garis marka amber putus-putus di atas kartu, senada dengan header dashboard */
        .register-card::before {
            content: "";
            position: absolute;
            left: 0; right: 0; top: -3px;
            height: 3px;
            background: repeating-linear-gradient(
                -45deg,
                var(--amber) 0 10px,
                #a86e12 10px 20px
            );
            opacity: .55;
        }

        .register-icon {
            background: linear-gradient(180deg, var(--baja-sedang) 0%, var(--baja-gelap) 100%);
            color: var(--amber);
            width: 3.25rem;
            height: 3.25rem;
            border-radius: 9999px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem auto;
            border: 2px solid var(--amber);
        }

        .register-label {
            color: var(--teks);
        }

        .register-input {
            background: var(--papan-terang);
            border: 1px solid rgba(27, 36, 48, .2);
            color: var(--teks);
        }

        .register-input:focus {
            outline: none;
            border-color: var(--amber);
            box-shadow: 0 0 0 3px var(--amber-lembut);
        }

        .register-button {
            background: var(--amber);
            color: #fff;
            transition: background-color .15s ease;
        }

        .register-button:hover {
            background: #a86e12;
        }

        .register-alert {
            background: #f7e3df;
            border: 1px solid rgba(163, 58, 43, .4);
            border-left: 4px solid #a33a2b;
            color: #6b2519;
        }

        .register-success {
            background: #d4edda;
            border: 1px solid rgba(40, 167, 69, .4);
            border-left: 4px solid #28a745;
            color: #155724;
        }

        /* Tombol toggle lihat/sembunyikan password */
        .toggle-password {
            color: var(--teks-redup, #6b7280);
            transition: color .15s ease;
        }

        .toggle-password:hover {
            color: var(--amber);
        }

        .form-error {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .login-link {
            color: var(--amber);
            text-decoration: none;
            transition: color .15s ease;
        }

        .login-link:hover {
            color: #a86e12;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen py-8">

    <div class="register-card p-8 rounded-lg shadow-md w-96">

        <div class="register-icon">
            <!-- ikon user tambah sederhana -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
                <polyline points="12 4 12 10 16 8"></polyline>
            </svg>
        </div>

        <h3 class="text-2xl font-bold text-center mb-1" style="color: var(--baja-gelap);">Daftar Akun</h3>
        <p class="text-center text-sm mb-6" style="color: var(--teks-redup);">Sistem Peminjaman Alat</p>

        @if(session('success'))
            <div class="register-success mb-4 p-3 rounded text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="register-alert mb-4 p-3 rounded text-sm">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="register-alert mb-4 p-3 rounded text-sm">
                <ul class="list-disc pl-5 mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="registerForm" method="POST" action="{{ route('register.store') }}">
            @csrf

            <!-- Nama Lengkap -->
            <div class="mb-4">
                <label class="register-label block text-sm font-semibold mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                <input type="text" name="name" value="{{ old('name') }}" required autofocus
                    class="register-input w-full px-3 py-2 rounded-lg @error('name') border-red-500 @enderror"
                    placeholder="Masukkan nama lengkap">
                @error('name')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label class="register-label block text-sm font-semibold mb-2">Email <span class="text-red-500">*</span></label>
                <input type="email" name="email" value="{{ old('email') }}" required
                    class="register-input w-full px-3 py-2 rounded-lg @error('email') border-red-500 @enderror"
                    placeholder="Masukkan email">
                @error('email')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Nomor HP -->
            <div class="mb-4">
                <label class="register-label block text-sm font-semibold mb-2">Nomor HP</label>
                <input type="text" name="no_hp" value="{{ old('no_hp') }}"
                    class="register-input w-full px-3 py-2 rounded-lg @error('no_hp') border-red-500 @enderror"
                    placeholder="Contoh: 081234567890">
                @error('no_hp')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Alamat -->
            <div class="mb-4">
                <label class="register-label block text-sm font-semibold mb-2">Alamat</label>
                <textarea name="alamat" rows="2"
                    class="register-input w-full px-3 py-2 rounded-lg @error('alamat') border-red-500 @enderror"
                    placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>
                @error('alamat')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label class="register-label block text-sm font-semibold mb-2">Password <span class="text-red-500">*</span></label>
                <div class="relative">
                    <input type="password" name="password" id="password" required
                        class="register-input w-full px-3 py-2 pr-10 rounded-lg @error('password') border-red-500 @enderror"
                        placeholder="Minimal 8 karakter">
                    <button type="button" id="togglePassword"
                        class="toggle-password absolute inset-y-0 right-0 flex items-center pr-3"
                        tabindex="-1" aria-label="Lihat password">
                        <!-- Ikon mata terbuka (default, password tersembunyi) -->
                        <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <!-- Ikon mata tercoret (saat password terlihat) -->
                        <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.025 10.025 0 012.174-3.362m3.196-2.12A9.958 9.958 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.964 9.964 0 01-4.132 5.411M3 3l18 18" />
                        </svg>
                    </button>
                </div>
                @error('password')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Konfirmasi Password -->
            <div class="mb-6">
                <label class="register-label block text-sm font-semibold mb-2">Konfirmasi Password <span class="text-red-500">*</span></label>
                <div class="relative">
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                        class="register-input w-full px-3 py-2 pr-10 rounded-lg"
                        placeholder="Ulangi password">
                    <button type="button" id="togglePasswordConfirm"
                        class="toggle-password absolute inset-y-0 right-0 flex items-center pr-3"
                        tabindex="-1" aria-label="Lihat password">
                        <!-- Ikon mata terbuka (default, password tersembunyi) -->
                        <svg id="eyeOpenConfirm" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <!-- Ikon mata tercoret (saat password terlihat) -->
                        <svg id="eyeClosedConfirm" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.025 10.025 0 012.174-3.362m3.196-2.12A9.958 9.958 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.964 9.964 0 01-4.132 5.411M3 3l18 18" />
                        </svg>
                    </button>
                </div>
            </div>

            <button type="submit"
                class="register-button w-full font-semibold py-2 rounded-lg">
                Daftar
            </button>

            <p class="text-center text-sm mt-4" style="color: var(--teks-redup);">
                Sudah punya akun? <a href="{{ route('login') }}" class="login-link">Masuk di sini</a>
            </p>
        </form>
    </div>

    <script>
        // Toggle password visibility
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeOpen = document.getElementById('eyeOpen');
        const eyeClosed = document.getElementById('eyeClosed');

        togglePassword.addEventListener('click', function () {
            const isHidden = passwordInput.type === 'password';
            passwordInput.type = isHidden ? 'text' : 'password';
            eyeOpen.classList.toggle('hidden', isHidden);
            eyeClosed.classList.toggle('hidden', !isHidden);
            togglePassword.setAttribute('aria-label', isHidden ? 'Sembunyikan password' : 'Lihat password');
        });

        // Toggle password confirmation visibility
        const togglePasswordConfirm = document.getElementById('togglePasswordConfirm');
        const passwordConfirmInput = document.getElementById('password_confirmation');
        const eyeOpenConfirm = document.getElementById('eyeOpenConfirm');
        const eyeClosedConfirm = document.getElementById('eyeClosedConfirm');

        togglePasswordConfirm.addEventListener('click', function () {
            const isHidden = passwordConfirmInput.type === 'password';
            passwordConfirmInput.type = isHidden ? 'text' : 'password';
            eyeOpenConfirm.classList.toggle('hidden', isHidden);
            eyeClosedConfirm.classList.toggle('hidden', !isHidden);
            togglePasswordConfirm.setAttribute('aria-label', isHidden ? 'Sembunyikan password' : 'Lihat password');
        });
    </script>

</body>
</html>
