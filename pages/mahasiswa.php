<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'mahasiswa') {
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa - SIA Vokasi</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/mahasiswa.css">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>
<body class="role-mahasiswa">

    <!-- Sidebar -->
    <nav class="mhs-sidebar">
        <div class="mhs-logo">
            <i class="ph-duotone ph-student"></i>
            <span>SIA Mahasiswa</span>
        </div>
        
        <div class="flex-1">
            <a href="#" class="mhs-nav-item active" onclick="switchPage('dashboard', this)">
                <i class="ph ph-squares-four"></i> Dashboard
            </a>
            <a href="#" class="mhs-nav-item" onclick="switchPage('krs', this)">
                <i class="ph ph-list-numbers"></i> KRS & Jadwal
            </a>
            <a href="#" class="mhs-nav-item" onclick="switchPage('nilai', this)">
                <i class="ph ph-exam"></i> Nilai & KHS
            </a>
            <a href="#" class="mhs-nav-item" onclick="switchPage('absensi', this)">
                <i class="ph ph-user-check"></i> Absensi
            </a>
            <a href="#" class="mhs-nav-item" onclick="switchPage('pengumuman', this)">
                <i class="ph ph-megaphone"></i> Pengumuman
            </a>
        </div>

        <a href="../logout.php" class="mhs-nav-item" style="color: #ef4444;">
            <i class="ph ph-sign-out"></i> Logout
        </a>
    </nav>

    <!-- Main Content -->
    <main class="mhs-main">
        
        <!-- Header -->
        <header class="mhs-header">
            <div>
                <h2 class="text-2xl font-bold">Halo, <?php echo htmlspecialchars($_SESSION['username']); ?>! 👋</h2>
                <p class="text-slate-500">Semester 4 - D3 Teknik Informatika</p>
            </div>
            <div class="user-profile">
                <div class="avatar"><?php echo strtoupper(substr($_SESSION['username'], 0, 2)); ?></div>
                <div class="text-sm">
                    <div class="font-bold"><?php echo htmlspecialchars($_SESSION['username']); ?></div>
                    <div class="text-slate-500"><?php echo htmlspecialchars($_SESSION['email']); ?></div>
                </div>
            </div>
        </header>

        <!-- PAGE: DASHBOARD -->
        <section id="dashboard" class="page-section active">
            <!-- Stats -->
            <div class="stat-grid">
                <div class="stat-card">
                    <div class="stat-label">SKS Diambil</div>
                    <div class="stat-value">22</div>
                    <div class="text-xs text-slate-500">Maksimal 24 SKS</div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">IPK Sementara</div>
                    <div class="stat-value">3.65</div>
                    <div class="text-xs text-green-600">+0.15 dari sem lalu</div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Kehadiran</div>
                    <div class="stat-value">92%</div>
                    <div class="text-xs text-slate-500">Pertahankan!</div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Tugas Pending</div>
                    <div class="stat-value" style="color: #f59e0b; -webkit-text-fill-color: initial;">3</div>
                    <div class="text-xs text-slate-500">Deadline terdekat 2 hari</div>
                </div>
            </div>

            <h3 class="text-xl font-bold mb-4">Jadwal Hari Ini</h3>
            <div class="schedule-list">
                <div class="schedule-item">
                    <div class="time-box">08:00 - 10:30</div>
                    <div class="class-info w-full">
                        <h4>Pemrograman Web Lanjut</h4>
                        <p><i class="ph ph-map-pin"></i> Lab Komputer 1 • Pak Budi Santoso</p>
                    </div>
                    <button class="bg-indigo-50 text-indigo-600 px-4 py-2 rounded-lg text-sm font-semibold">Lihat Materi</button>
                </div>
                <div class="schedule-item">
                    <div class="time-box">13:00 - 15:30</div>
                    <div class="class-info w-full">
                        <h4>Basis Data 2</h4>
                        <p><i class="ph ph-map-pin"></i> Ruang Teori 3.2 • Bu Siti Aminah</p>
                    </div>
                    <button class="bg-indigo-50 text-indigo-600 px-4 py-2 rounded-lg text-sm font-semibold">Lihat Materi</button>
                </div>
            </div>
        </section>

        <!-- PAGE: KRS -->
        <section id="krs" class="page-section">
            <div class="flex justify-between items-center mb-6">
                <h3 class="section-title"><i class="ph-duotone ph-list-numbers text-indigo-500"></i> Kartu Rencana Studi</h3>
                <button class="bg-indigo-600 text-white px-5 py-2.5 rounded-xl font-semibold hover:bg-indigo-700 transition">
                    <i class="ph ph-plus"></i> Tambah Matkul
                </button>
            </div>
            
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm mb-6">
                <div class="flex gap-8 mb-4">
                    <div>
                        <div class="text-sm text-slate-500">Status KRS</div>
                        <div class="text-lg font-bold text-green-600">Disetujui</div>
                    </div>
                    <div>
                        <div class="text-sm text-slate-500">Dosen Wali</div>
                        <div class="text-lg font-bold">Dr. Rina Wati, M.Kom</div>
                    </div>
                    <div>
                        <div class="text-sm text-slate-500">Total SKS</div>
                        <div class="text-lg font-bold">22 / 24</div>
                    </div>
                </div>
            </div>

            <table class="modern-table">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Jadwal</th>
                        <th>Ruangan</th>
                        <th>Dosen</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="font-mono text-sm">TIK201</td>
                        <td class="font-semibold">Pemrograman Web Lanjut</td>
                        <td>3</td>
                        <td>Senin, 08:00</td>
                        <td>Lab 1</td>
                        <td>Pak Budi</td>
                    </tr>
                    <tr>
                        <td class="font-mono text-sm">TIK202</td>
                        <td class="font-semibold">Basis Data 2</td>
                        <td>3</td>
                        <td>Senin, 13:00</td>
                        <td>R. 3.2</td>
                        <td>Bu Siti</td>
                    </tr>
                    <tr>
                        <td class="font-mono text-sm">TIK205</td>
                        <td class="font-semibold">Statistika Dasar</td>
                        <td>2</td>
                        <td>Selasa, 10:00</td>
                        <td>R. 2.1</td>
                        <td>Pak Joko</td>
                    </tr>
                    <tr>
                        <td class="font-mono text-sm">TIK210</td>
                        <td class="font-semibold">Jaringan Komputer</td>
                        <td>3</td>
                        <td>Rabu, 08:00</td>
                        <td>Lab Jarkom</td>
                        <td>Pak Dedi</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <!-- PAGE: NILAI -->
        <section id="nilai" class="page-section">
            <h3 class="section-title"><i class="ph-duotone ph-exam text-indigo-500"></i> Transkrip Nilai Semester Ini</h3>
            
            <table class="modern-table">
                <thead>
                    <tr>
                        <th>Mata Kuliah</th>
                        <th>Absensi</th>
                        <th>Tugas</th>
                        <th>UTS</th>
                        <th>UAS</th>
                        <th>Nilai Akhir</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Pemrograman Web Lanjut</td>
                        <td>100</td>
                        <td>85</td>
                        <td>88</td>
                        <td>-</td>
                        <td>-</td>
                        <td><span class="tag warning">Proses</span></td>
                    </tr>
                    <tr>
                        <td>Algoritma & Struktur Data</td>
                        <td>90</td>
                        <td>90</td>
                        <td>85</td>
                        <td>95</td>
                        <td>92</td>
                        <td><span class="tag success">A</span></td>
                    </tr>
                    <tr>
                        <td>Bahasa Inggris</td>
                        <td>85</td>
                        <td>80</td>
                        <td>80</td>
                        <td>85</td>
                        <td>82</td>
                        <td><span class="tag success">B+</span></td>
                    </tr>
                </tbody>
            </table>
        </section>

         <!-- PAGE: ABSENSI -->
         <section id="absensi" class="page-section">
            <h3 class="section-title"><i class="ph-duotone ph-user-check text-indigo-500"></i> Rekap Absensi</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- item -->
                <div class="bg-white p-6 rounded-2xl border border-slate-200">
                    <div class="flex justify-between mb-2">
                        <h4 class="font-bold">Pemrograman Web Lanjut</h4>
                        <span class="text-green-600 font-bold">100%</span>
                    </div>
                    <div class="progress-container mb-4">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <div class="flex gap-2 text-sm text-slate-500 items-center">
                        <span class="tag success text-xs">Hadir: 14</span>
                        <span class="tag warning text-xs">Izin: 0</span>
                        <span class="tag error text-xs">Alpha: 0</span>
                    </div>
                </div>

                <!-- item -->
                <div class="bg-white p-6 rounded-2xl border border-slate-200">
                    <div class="flex justify-between mb-2">
                        <h4 class="font-bold">Basis Data 2</h4>
                        <span class="text-amber-500 font-bold">85%</span>
                    </div>
                    <div class="progress-container mb-4">
                        <div class="progress-bar bg-amber-500" style="width: 85%; background: #f59e0b;"></div>
                    </div>
                    <div class="flex gap-2 text-sm text-slate-500 items-center">
                        <span class="tag success text-xs">Hadir: 12</span>
                        <span class="tag warning text-xs">Izin: 2</span>
                        <span class="tag error text-xs">Alpha: 0</span>
                    </div>
                </div>

                <!-- item -->
                <div class="bg-white p-6 rounded-2xl border border-slate-200">
                    <div class="flex justify-between mb-2">
                        <h4 class="font-bold">Jaringan Komputer</h4>
                        <span class="text-red-500 font-bold">60%</span>
                    </div>
                    <div class="progress-container mb-4">
                        <div class="progress-bar" style="width: 60%; background: #ef4444;"></div>
                    </div>
                    <div class="flex gap-2 text-sm text-slate-500 items-center">
                        <span class="tag success text-xs">Hadir: 8</span>
                        <span class="tag warning text-xs">Izin: 0</span>
                        <span class="tag error text-xs">Alpha: 6</span>
                        <span class="text-xs text-red-500 ml-auto font-bold"><i class="ph-bold ph-warning"></i> Bahaya</span>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <script>
        function switchPage(pageId, element) {
            // Hide all sections
            document.querySelectorAll('.page-section').forEach(section => {
                section.classList.remove('active');
            });
            // Show target section
            document.getElementById(pageId).classList.add('active');
            
            // Update nav active state
            document.querySelectorAll('.mhs-nav-item').forEach(item => {
                item.classList.remove('active');
            });
            element.classList.add('active');
        }
    </script>
</body>
</html>
