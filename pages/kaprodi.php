<?php
session_start();
if (!isset($_SESSION['user_id']) || !in_array($_SESSION['role'], ['kaprodi', 'prodi'])) {
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kaprodi - SIA Vokasi</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/kaprodi.css">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>
<body class="role-kaprodi">

    <nav class="prodi-sidebar">
        <div class="prodi-sidebar-header">
            <span class="text-teal-400 mr-2"><i class="ph-fill ph-circles-three-plus"></i></span> Admin Prodi
        </div>
        
        <div class="prodi-nav-header">Utama</div>
        <a href="#" class="prodi-nav-item active" onclick="switchPage('dashboard', this)">
            <i class="ph ph-squares-four"></i> Dashboard
        </a>
        
        <div class="prodi-nav-header">Akademik</div>
        <a href="#" class="prodi-nav-item" onclick="switchPage('kurikulum', this)">
            <i class="ph ph-books"></i> Manajemen Kurikulum
        </a>
        <a href="#" class="prodi-nav-item" onclick="switchPage('krs-approval', this)">
            <i class="ph ph-check-circle"></i> Approval KRS
        </a>

        <div class="prodi-nav-header">Monitoring</div>
        <a href="#" class="prodi-nav-item" onclick="switchPage('dosen', this)">
            <i class="ph ph-chalkboard-teacher"></i> Monitoring Dosen
        </a>
        <a href="#" class="prodi-nav-item" onclick="switchPage('mahasiswa', this)">
            <i class="ph ph-student"></i> Monitoring Mahasiswa
        </a>

         <div class="mt-auto border-t border-slate-700">
            <a href="../logout.php" class="prodi-nav-item text-red-400 hover:text-red-300">
                <i class="ph ph-sign-out"></i> Logout
            </a>
        </div>
    </nav>

    <main class="prodi-main">
        <div class="prodi-topbar">
            <h2 class="font-bold text-slate-800 text-lg" id="page-title">Dashboard Overview</h2>
            <div class="flex items-center gap-3">
                 <button class="btn-sm flex items-center gap-2"><i class="ph ph-plus"></i> Buat Pengumuman</button>
                 <div class="w-8 h-8 rounded-full bg-teal-100 flex items-center justify-center text-teal-700 font-bold text-xs">KP</div>
            </div>
        </div>

        <!-- PAGE: DASHBOARD -->
        <section id="dashboard" class="page-section active">
            <div class="grid grid-cols-4 gap-4 mb-6">
                <div class="k-card border-l-4 border-teal-500">
                    <div class="k-stat-label">Mahasiswa Aktif</div>
                    <div class="k-stat-value">452</div>
                </div>
                <div class="k-card border-l-4 border-blue-500">
                    <div class="k-stat-label">Dosen Tetap</div>
                    <div class="k-stat-value">34</div>
                </div>
                 <div class="k-card border-l-4 border-amber-500">
                    <div class="k-stat-label">Pending KRS</div>
                    <div class="k-stat-value">12</div>
                </div>
                <div class="k-card border-l-4 border-red-500">
                    <div class="k-stat-label">Input Nilai Belum</div>
                    <div class="k-stat-value">8</div>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-6 mb-6">
                <div class="k-card">
                    <h3 class="font-bold text-slate-700 mb-4">Distribusi Nilai Rata-rata</h3>
                    <div class="chart-placeholder">
                        [Grafik Bar: A(30%), B(40%), C(20%), D(5%), E(5%)]
                    </div>
                </div>
                <div class="k-card">
                    <h3 class="font-bold text-slate-700 mb-4">Tingkat Kehadiran Per Angkatan</h3>
                    <div class="chart-placeholder">
                         [Grafik Line: 2021(90%), 2022(85%), 2023(92%)]
                    </div>
                </div>
            </div>

            <div class="k-card">
                <h3 class="font-bold text-slate-700 mb-4">Dosen Perlu Atensi (Input Nilai < 50%)</h3>
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Nama Dosen</th>
                            <th>Mata Kuliah</th>
                            <th>Progress Input</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Drs. Budi Santoso</td>
                            <td>Jaringan Komputer</td>
                            <td>20%</td>
                            <td><span class="status-badge badge-red">Kritis</span></td>
                        </tr>
                         <tr>
                            <td>Siti Aminah, M.Kom</td>
                            <td>Algoritma</td>
                            <td>45%</td>
                            <td><span class="status-badge badge-yellow">Warning</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- PAGE: KURIKULUM -->
        <section id="kurikulum" class="page-section hidden">
            <div class="toolbar">
                <input type="text" class="search-input" placeholder="Cari mata kuliah...">
                <button class="btn-sm bg-teal-600 text-white border-none hover:bg-teal-700">Tambah Mata Kuliah</button>
            </div>
            <div class="k-card">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Semester</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>TIK101</td>
                            <td>Dasar Pemrograman</td>
                            <td>3</td>
                            <td>1</td>
                            <td><span class="status-badge badge-green">Aktif</span></td>
                            <td><button class="text-blue-600">Edit</button></td>
                        </tr>
                        <tr>
                            <td>TIK102</td>
                            <td>Logika Matematika</td>
                            <td>2</td>
                            <td>1</td>
                            <td><span class="status-badge badge-green">Aktif</span></td>
                            <td><button class="text-blue-600">Edit</button></td>
                        </tr>
                        <tr>
                            <td>TIK201</td>
                            <td>Pemrograman Web</td>
                            <td>4</td>
                            <td>3</td>
                            <td><span class="status-badge badge-green">Aktif</span></td>
                            <td><button class="text-blue-600">Edit</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- PAGE: MONITORING MAHASISWA -->
        <section id="mahasiswa" class="page-section hidden">
             <div class="toolbar">
                <div class="flex gap-2">
                    <input type="text" class="search-input" placeholder="Cari Nama/NIM...">
                    <select class="btn-sm"><option>Semua Angkatan</option><option>2022</option><option>2023</option></select>
                </div>
                <button class="btn-sm"><i class="ph ph-download"></i> Export Excel</button>
            </div>
             <div class="k-card">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Angkatan</th>
                            <th>IPK Sem Lalu</th>
                            <th>Absensi %</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>220101010</td>
                            <td>Adrian Alifa</td>
                            <td>2022</td>
                            <td>3.65</td>
                            <td>92%</td>
                            <td><span class="status-badge badge-green">Aman</span></td>
                        </tr>
                        <tr>
                            <td>220101055</td>
                            <td>Rudi Tabuti</td>
                            <td>2022</td>
                            <td>2.10</td>
                            <td>65%</td>
                            <td><span class="status-badge badge-red">Bahaya</span></td>
                        </tr>
                         <tr>
                            <td>220101060</td>
                            <td>Sari Roti</td>
                            <td>2022</td>
                            <td>2.80</td>
                            <td>78%</td>
                            <td><span class="status-badge badge-yellow">Pantau</span></td>
                        </tr>
                    </tbody>
                </table>
             </div>
        </section>

    </main>
    
    <script>
        function switchPage(pageId, element) {
            document.querySelectorAll('.page-section').forEach(s => {
                s.classList.add('hidden');
                s.classList.remove('active');
            });
            document.getElementById(pageId).classList.remove('hidden');
            document.getElementById(pageId).classList.add('active');

            document.querySelectorAll('.prodi-nav-item').forEach(i => i.classList.remove('active'));
            element.classList.add('active');

            const titleMap = {
                'dashboard': 'Dashboard Overview',
                'kurikulum': 'Manajemen Kurikulum',
                'mahasiswa': 'Monitoring Mahasiswa',
                'dosen': 'Monitoring Dosen',
                'krs-approval': 'Approval KRS'
            };
            document.getElementById('page-title').innerText = titleMap[pageId] || 'Dashboard';
        }
    </script>
</body>
</html>
