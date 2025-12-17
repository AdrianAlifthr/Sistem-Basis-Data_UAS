<?php
session_start();
require_once 'config.php';

$error = '';
$role_from_url = isset($_GET['role']) ? $_GET['role'] : 'mahasiswa';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // $role_input = $_POST['role']; // If we want to enforce role check

    // Prevent SQL Injection
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    // Query to check user
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Validasi Role Strict
        // Cek apakah role dari database sesuai dengan role di URL (portal login)
        $db_role = $row['role'];
        $is_valid_role = false;

        if ($role_from_url == 'mahasiswa' && $db_role == 'mahasiswa') {
            $is_valid_role = true;
        } elseif ($role_from_url == 'dosen' && $db_role == 'dosen') {
            $is_valid_role = true;
        } elseif (($role_from_url == 'kaprodi' || $role_from_url == 'prodi') && ($db_role == 'kaprodi' || $db_role == 'prodi')) {
            $is_valid_role = true;
        } elseif ($role_from_url == 'orangtua' && $db_role == 'orang_tua') {
            $is_valid_role = true;
        }

        if (!$is_valid_role) {
            // Mapping nama role untuk pesan error
            $role_names = [
                'mahasiswa' => 'Mahasiswa',
                'dosen' => 'Dosen',
                'kaprodi' => 'Kaprodi',
                'prodi' => 'Kaprodi',
                'orang_tua' => 'Orang Tua'
            ];
            $correct_portal = isset($role_names[$db_role]) ? $role_names[$db_role] : $db_role;
            $error = "Akun Anda terdaftar sebagai <strong>$correct_portal</strong>. Silakan login melalui menu $correct_portal.";
            // Jangan set session, jangan redirect ke dashboard
        } else {
            // Login Berhasil

        
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['email'] = $row['email'];

        // Redirect based on role
        switch ($row['role']) {
            case 'mahasiswa':
                header("Location: pages/mahasiswa.php");
                break;
            case 'dosen':
                header("Location: pages/dosen.php");
                break;
            case 'kaprodi':
            case 'prodi':
                header("Location: pages/kaprodi.php");
                break;
            case 'orang_tua': // Note: DB might use 'orang_tua', config used 'orangtua'. Check DB data in prompt: 'orang_tua'
                header("Location: pages/orangtua.php");
                break;
            default:
                header("Location: index.html");
        }
        exit();
    }
    } else {
        $error = "Username atau password salah!";
    }
}
?>
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
            border: none;
            cursor: pointer;
        }
        .btn-login:hover { opacity: 0.9; }

        .error-message {
            color: #ef4444;
            background: #fef2f2;
            padding: 0.75rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
            text-align: center;
            border: 1px solid #fee2e2;
        }

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

        <?php if ($error): ?>
            <div class="error-message">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label id="label-identity" class="form-label">Username</label>
                <div class="relative" style="display: flex; align-items: center; gap: 8px;">
                    <i class="ph ph-user absolute left-3.5 top-3 text-slate-400 text-lg"></i>
                    <input type="text" name="username" class="form-input pl-10" placeholder="Masukkan ID pengguna" required>
                </div>
            </div>

            <div class="form-group" >
                <label class="form-label">Password</label>
                <div class="relative" style="display: flex; align-items: center; gap: 8px;">
                    <i class="ph ph-lock-key absolute left-3.5 top-3 text-slate-400 text-lg" ></i>
                    <input type="password" name="password" class="form-input pl-10" placeholder="••••••••" required>
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
                themeClass: 'theme-mahasiswa'
            },
            'dosen': {
                title: 'Login Dosen',
                icon: 'ph-chalkboard-teacher',
                labelBuilder: 'NIDN/NIP',
                themeClass: 'theme-dosen'
            },
            'kaprodi': {
                title: 'Login Kaprodi',
                icon: 'ph-briefcase',
                labelBuilder: 'NIP',
                themeClass: 'theme-kaprodi'
            },
            'prodi': {
                title: 'Login Kaprodi',
                icon: 'ph-briefcase',
                labelBuilder: 'NIP',
                themeClass: 'theme-kaprodi'
            },
            'orangtua': {
                title: 'Login Orang Tua',
                icon: 'ph-users-three',
                labelBuilder: 'Email Terdaftar',
                themeClass: 'theme-orangtua'
            }
        };

        const currentConfig = config[role] || config['mahasiswa'];

        // Apply UI
        document.body.classList.add(currentConfig.themeClass);
        document.getElementById('role-title').innerText = currentConfig.title;
        document.getElementById('role-icon').classList.add(currentConfig.icon);
        document.getElementById('label-identity').innerText = currentConfig.labelBuilder;
        document.getElementById('role-name-text').innerText = role.replace('-', ' ');

        // Note: Form submission is now handled by PHP, so we removed the onsubmit handler.
    </script>
</body>
</html>
