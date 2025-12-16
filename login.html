<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SIA Vokasi</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
        .login-card {
            background: white;
            padding: 2.5rem;
            border-radius: 1.5rem;
            width: 100%;
            max-width: 420px;
            box-shadow: var(--shadow-xl);
            position: relative;
            overflow: hidden;
        }
        
        /* Dynamic Header Background */
        .login-header {
            margin: -2.5rem -2.5rem 2rem -2.5rem;
            padding: 2.5rem 2rem 2rem;
            color: white;
            text-align: center;
        }

        .login-header h2 { font-size: 1.75rem; margin-bottom: 0.5rem; }
        .login-header p { opacity: 0.9; font-size: 0.95rem; }

        .form-group { margin-bottom: 1.5rem; }
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            font-size: 0.9rem;
            color: var(--text-primary);
        }
        
        .form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border-radius: 0.75rem;
            border: 1px solid var(--border-color);
            font-family: inherit;
            transition: all 0.2s;
        }
        
        .form-input:focus {
            outline: none;
            border-color: currentColor;
            box-shadow: 0 0 0 3px rgba(0,0,0,0.05);
        }

        .btn-login {
            width: 100%;
            padding: 0.875rem;
            border-radius: 0.75rem;
            font-weight: 600;
            color: white;
            transition: opacity 0.2s;
        }
        .btn-login:hover { opacity: 0.9; }

        /* Theme Specifics */
        .theme-mahasiswa .login-header, .theme-mahasiswa .btn-login { background: var(--mhs-gradient); }
        .theme-mahasiswa .form-input:focus { border-color: var(--mhs-accent); box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1); }
        .theme-mahasiswa a { color: var(--mhs-primary); }

        .theme-dosen .login-header, .theme-dosen .btn-login { background: #0f172a; }
        .theme-dosen .form-input:focus { border-color: var(--dosen-primary); }
        .theme-dosen a { color: var(--dosen-primary); }
        
        .theme-kaprodi .login-header, .theme-kaprodi .btn-login { background: var(--prodi-primary); }
        .theme-kaprodi .form-input:focus { border-color: var(--prodi-primary); }
        .theme-kaprodi a { color: var(--prodi-primary); }

        .theme-orangtua .login-header, .theme-orangtua .btn-login { background: var(--ortu-primary); }
        .theme-orangtua .form-input:focus { border-color: var(--ortu-primary); }
        .theme-orangtua a { color: var(--ortu-primary); }

    </style>
</head>
<body class="flex items-center justify-center bg-slate-50 p-4">

    <div class="login-card">
        <div class="login-header">
            <div class="mb-3 text-4xl"><i id="role-icon" class="ph-fill"></i></div>
            <h2 id="role-title">Login</h2>
            <p>Silakan masuk ke akun Anda</p>
        </div>

        <form onsubmit="handleLogin(event)">
            <div class="form-group">
                <label id="label-identity" class="form-label">Username</label>
                <div class="relative" style="display: flex; align-items: center; gap: 8px;">
                    <i class="ph ph-user absolute left-3.5 top-3 text-slate-400 text-lg"></i>
                    <input type="text" class="form-input pl-10" placeholder="Masukkan ID pengguna" required>
                </div>
            </div>

            <div class="form-group" >
                <label class="form-label">Password</label>
                <div class="relative" style="display: flex; align-items: center; gap: 8px;">
                    <i class="ph ph-lock-key absolute left-3.5 top-3 text-slate-400 text-lg" ></i>
                    <input type="password" class="form-input pl-10" placeholder="••••••••" required>
                </div>
                <div class="text-right" style="margin-top: 10px;">
                    <a href="#" class="text-xs font-semibold hover:underline">Lupa password?</a>
                </div>
            </div>

            <button type="submit" class="btn-login">
                Masuk Sekarang <i class="ph-bold ph-arrow-right ml-1"></i>
            </button>
        </form>

        <div class="mt-6 text-center text-sm text-slate-500" style="margin-top: 10px;">
            Bukan <span id="role-name-text">admin</span>? <a href="index.html" class="font-semibold hover:underline">Ganti Role</a>
        </div>
    </div>

    <script>
        // Get Role from URL
        const urlParams = new URLSearchParams(window.location.search);
        const role = urlParams.get('role') || 'mahasiswa'; // Default to mahasiswa

        // Config
        const config = {
            'mahasiswa': {
                title: 'Login Mahasiswa',
                icon: 'ph-student',
                labelBuilder: 'NIM',
                themeClass: 'theme-mahasiswa',
                redirect: 'pages/mahasiswa.html'
            },
            'dosen': {
                title: 'Login Dosen',
                icon: 'ph-chalkboard-teacher',
                labelBuilder: 'NIDN/NIP',
                themeClass: 'theme-dosen',
                redirect: 'pages/dosen.html'
            },
            'kaprodi': {
                title: 'Login Kaprodi',
                icon: 'ph-briefcase',
                labelBuilder: 'NIP',
                themeClass: 'theme-kaprodi',
                redirect: 'pages/kaprodi.html'
            },
            'orangtua': {
                title: 'Login Orang Tua',
                icon: 'ph-users-three',
                labelBuilder: 'Email Terdaftar',
                themeClass: 'theme-orangtua',
                redirect: 'pages/orangtua.html'
            }
        };

        const currentConfig = config[role];

        // Apply UI
        document.body.classList.add(currentConfig.themeClass);
        document.getElementById('role-title').innerText = currentConfig.title;
        document.getElementById('role-icon').classList.add(currentConfig.icon);
        document.getElementById('label-identity').innerText = currentConfig.labelBuilder;
        document.getElementById('role-name-text').innerText = role.replace('-', ' ');

        // Handle Login
        function handleLogin(e) {
            e.preventDefault();
            // Simulate loading
            const btn = document.querySelector('.btn-login');
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="ph-bold ph-spinner ph-spin"></i> Memproses...';
            btn.style.opacity = '0.7';
            
            setTimeout(() => {
                window.location.href = currentConfig.redirect;
            }, 800);
        }
    </script>
</body>
</html>
