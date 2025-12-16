<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Dosen - SIA Vokasi</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/dosen.css">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>
<body class="role-dosen">

    <!-- Sidebar -->
    <nav class="dosen-sidebar">
        <div class="dosen-logo">
            <i class="ph-fill ph-chalkboard-teacher"></i>
            <span>Dosen Panel</span>
        </div>
        
        <div class="flex-1">
            <a href="#" class="dosen-nav-item active" onclick="switchPage('dashboard', this)">
                <i class="ph ph-squares-four"></i> Dashboard
            </a>
            <a href="#" class="dosen-nav-item" onclick="switchPage('mengajar', this)">
                <i class="ph ph-briefcase"></i> Mata Kuliah Saya
            </a>
            <a href="#" class="dosen-nav-item" onclick="switchPage('input-nilai', this)">
                <i class="ph ph-exam"></i> Input Nilai
            </a>
             <!-- <a href="#" class="dosen-nav-item" onclick="switchPage('absensi', this)">
                <i class="ph ph-user-check"></i> Absensi
            </a> -->
            <a href="#" class="dosen-nav-item" onclick="switchPage('pesan', this)">
                <i class="ph ph-chat-teardrop-text"></i> Pesan & Tiket
            </a>
        </div>

        <a href="../index.html" class="dosen-nav-item">
            <i class="ph ph-sign-out"></i> Keluar
        </a>
    </nav>

    <!-- Main Content -->
    <main class="dosen-main">
        
        <!-- Header -->
        <header class="dosen-header">
            <h2 class="text-xl font-bold text-slate-700" id="page-title">Dashboard</h2>
            <div class="flex items-center gap-4">
                <button class="relative">
                    <i class="ph ph-bell text-2xl text-slate-500"></i>
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">3</span>
                </button>
                <div class="flex items-center gap-2">
                    <div class="text-right">
                        <div class="font-bold text-sm text-slate-700">Budi Santoso, M.Kom</div>
                        <div class="text-xs text-slate-500">NIDN: 01010101</div>
                    </div>
                </div>
            </div>
        </header>

        <!-- PAGE: DASHBOARD -->
        <section id="dashboard" class="page-section active">
            
            <div class="alert-box">
                <i class="ph-fill ph-warning-circle text-amber-500 text-2xl"></i>
                <div class="flex-1">
                    <h4 class="font-bold text-slate-800">Pengingat Input Nilai</h4>
                    <p class="text-sm text-slate-600">Batas akhir input nilai UTS untuk mata kuliah Pemrograman Web Lanjut adalah 2 hari lagi.</p>
                </div>
                <button class="text-sm text-blue-600 font-semibold underline">Input Sekarang</button>
            </div>

            <div class="grid grid-cols-3 gap-6 mb-6">
                <!-- Stat 1 -->
                <div class="d-card flex items-center gap-4">
                    <div class="p-3 bg-blue-100 text-blue-600 rounded-lg">
                        <i class="ph-fill ph-book-open text-2xl"></i>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-slate-800">4</div>
                        <div class="text-sm text-slate-500">Kelas Aktif</div>
                    </div>
                </div>
                <!-- Stat 2 -->
                <div class="d-card flex items-center gap-4">
                    <div class="p-3 bg-green-100 text-green-600 rounded-lg">
                        <i class="ph-fill ph-check-circle text-2xl"></i>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-slate-800">120</div>
                        <div class="text-sm text-slate-500">Total Mahasiswa</div>
                    </div>
                </div>
                <!-- Stat 3 -->
                <div class="d-card flex items-center gap-4">
                    <div class="p-3 bg-red-100 text-red-600 rounded-lg">
                        <i class="ph-fill ph-x-circle text-2xl"></i>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-slate-800">5</div>
                        <div class="text-sm text-slate-500">Absensi Bermasalah</div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div class="d-card">
                    <h3>Jadwal Mengajar Hari Ini</h3>
                    <ul class="space-y-4">
                        <li class="flex justify-between items-center border-b pb-2 border-slate-100">
                            <div>
                                <div class="font-bold text-slate-700">08:00 - 10:30</div>
                                <div class="text-sm text-slate-600">Pemrograman Web Lanjut (TI-4A)</div>
                            </div>
                            <span class="px-2 py-1 bg-green-100 text-green-700 text-xs font-bold rounded">Berlangsung</span>
                        </li>
                         <li class="flex justify-between items-center border-b pb-2 border-slate-100">
                            <div>
                                <div class="font-bold text-slate-700">13:00 - 15:30</div>
                                <div class="text-sm text-slate-600">Basis Data 2 (TI-2B)</div>
                            </div>
                            <span class="px-2 py-1 bg-slate-100 text-slate-600 text-xs font-bold rounded">Akan Datang</span>
                        </li>
                    </ul>
                </div>
                
                <div class="d-card">
                    <h3>Statistik Kehadiran Rata-rata</h3>
                    <div class="space-y-3">
                        <div>
                            <div class="flex justify-between text-sm mb-1 text-slate-600">
                                <span>Pemrograman Web Lanjut</span>
                                <span>95%</span>
                            </div>
                            <div class="w-full bg-slate-100 rounded-full h-2">
                                <div class="bg-indigo-500 h-2 rounded-full" style="width: 95%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm mb-1 text-slate-600">
                                <span>Basis Data 2</span>
                                <span>88%</span>
                            </div>
                            <div class="w-full bg-slate-100 rounded-full h-2">
                                <div class="bg-indigo-500 h-2 rounded-full" style="width: 88%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- PAGE: MENGAJAR -->
        <section id="mengajar" class="page-section hidden">
            <h3 class="text-xl font-bold mb-4 text-slate-700">Daftar Mata Kuliah Semester Ganjil 2024/2025</h3>
            <div class="class-grid">
                <!-- Class 1 -->
                <div class="class-card">
                    <div class="class-header">
                        <span>Pehrograman Web Lanjut</span>
                        <span class="bg-white px-2 rounded text-xs border border-slate-200 flex items-center">3 SKS</span>
                    </div>
                    <div class="class-body">
                        <div class="text-sm text-slate-600 mb-2">Kode: TIK201 • Kelas TI-4A</div>
                        <div class="text-sm text-slate-600 mb-4">Jadwal: Senin, 08:00 - 10:30</div>
                        <div class="flex gap-2 text-xs">
                             <span class="bg-emerald-50 text-emerald-700 px-2 py-1 rounded">32 Mahasiswa</span>
                             <span class="bg-blue-50 text-blue-700 px-2 py-1 rounded">Lab 1</span>
                        </div>
                    </div>
                    <div class="class-actions">
                        <a href="#" class="action-btn">List Mhs</a>
                        <a href="#" class="action-btn">Absensi</a>
                        <a href="#" class="action-btn">Nilai</a>
                    </div>
                </div>
                <!-- Class 2 -->
                <div class="class-card">
                    <div class="class-header">
                        <span>Basis Data 2</span>
                        <span class="bg-white px-2 rounded text-xs border border-slate-200 flex items-center">3 SKS</span>
                    </div>
                    <div class="class-body">
                        <div class="text-sm text-slate-600 mb-2">Kode: TIK202 • Kelas TI-2B</div>
                        <div class="text-sm text-slate-600 mb-4">Jadwal: Senin, 13:00 - 15:30</div>
                        <div class="flex gap-2 text-xs">
                             <span class="bg-emerald-50 text-emerald-700 px-2 py-1 rounded">28 Mahasiswa</span>
                             <span class="bg-blue-50 text-blue-700 px-2 py-1 rounded">R 3.2</span>
                        </div>
                    </div>
                    <div class="class-actions">
                        <a href="#" class="action-btn">List Mhs</a>
                        <a href="#" class="action-btn">Absensi</a>
                        <a href="#" class="action-btn">Nilai</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- PAGE: INPUT NILAI -->
        <section id="input-nilai" class="page-section hidden">
            <div class="d-card mb-6">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <h3 class="font-bold text-slate-800">Form Input Nilai</h3>
                        <p class="text-sm text-slate-500">Kelas: Pemrograman Web Lanjut (TI-4A)</p>
                    </div>
                    <div class="flex gap-2">
                        <button class="btn-outline">Download Template Excel</button>
                        <button class="btn-primary">Upload Excel</button>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="data-table">
                        <thead>
                            <tr class="bg-slate-50">
                                <th>NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th width="100">Tugas (20%)</th>
                                <th width="100">UTS (30%)</th>
                                <th width="100">UAS (50%)</th>
                                <th width="80">Akhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>220101010</td>
                                <td>Adrian Alifa</td>
                                <td><input type="number" class="input-small" value="85"></td>
                                <td><input type="number" class="input-small" value="88"></td>
                                <td><input type="number" class="input-small placeholder-slate-300" placeholder="0"></td>
                                <td class="font-bold">-</td>
                            </tr>
                            <tr>
                                <td>220101011</td>
                                <td>Budi Raharjo</td>
                                <td><input type="number" class="input-small" value="90"></td>
                                <td><input type="number" class="input-small" value="85"></td>
                                <td><input type="number" class="input-small placeholder-slate-300" placeholder="0"></td>
                                <td class="font-bold">-</td>
                            </tr>
                             <tr>
                                <td>220101012</td>
                                <td>Citra Dewi</td>
                                <td><input type="number" class="input-small border-red-300 bg-red-50" placeholder="Kosong"></td>
                                <td><input type="number" class="input-small" value="75"></td>
                                <td><input type="number" class="input-small placeholder-slate-300" placeholder="0"></td>
                                <td class="font-bold">-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 flex justify-end gap-2">
                    <button class="btn-outline">Simpan Draft</button>
                    <button class="btn-primary">Finalisasi & Submit</button>
                </div>
            </div>
        </section>
        
        <!-- PAGE: PESAN -->
        <section id="pesan" class="page-section hidden">
            <div class="d-card" style="height: 600px; display:flex; padding:0; overflow:hidden;">
                <!-- Chat Sidebar -->
                <div class="w-1/3 border-r border-slate-200 flex flex-col">
                    <div class="p-3 border-b border-slate-200 bg-slate-50">
                        <input type="text" placeholder="Cari mahasiswa..." class="w-full text-sm p-2 border rounded">
                    </div>
                    <div class="flex-1 overflow-y-auto">
                        <div class="p-3 border-b hover:bg-slate-50 cursor-pointer bg-blue-50">
                            <div class="font-bold text-sm text-slate-800">Adrian Alifa</div>
                            <div class="text-xs text-slate-500 truncate">Pak, izin bertanya soal tugas...</div>
                        </div>
                        <div class="p-3 border-b hover:bg-slate-50 cursor-pointer">
                            <div class="font-bold text-sm text-slate-800">Komting TI-4A</div>
                            <div class="text-xs text-slate-500 truncate">Apakah besok kelas libur pak?</div>
                        </div>
                    </div>
                </div>
                <!-- Chat Area -->
                <div class="w-2/3 flex flex-col bg-slate-50">
                    <div class="p-4 bg-white border-b border-slate-200 font-bold text-slate-700">Adrian Alifa (220101010)</div>
                    <div class="flex-1 p-4 overflow-y-auto space-y-4">
                        <div class="flex justify-end">
                            <div class="bg-blue-600 text-white rounded-lg rounded-tr-none px-4 py-2 max-w-xs text-sm">
                                Jangan lupa kumpulkan tugas sebelum jam 12 malam ya.
                            </div>
                        </div>
                        <div class="flex justify-start">
                            <div class="bg-white border rounded-lg rounded-tl-none px-4 py-2 max-w-xs text-sm shadow-sm">
                                Baik pak, terima kasih informasinya. Saya sedang mengerjakannya.
                            </div>
                        </div>
                         <div class="flex justify-start">
                            <div class="bg-white border rounded-lg rounded-tl-none px-4 py-2 max-w-xs text-sm shadow-sm">
                                Pak, izin bertanya soal tugas nomor 3, apakah boleh pakai framework?
                            </div>
                        </div>
                    </div>
                    <div class="p-3 bg-white border-t border-slate-200">
                        <div class="flex gap-2">
                             <input type="text" placeholder="Ketik pesan..." class="flex-1 text-sm p-2 border rounded">
                             <button class="btn-primary"><i class="ph-bold ph-paper-plane-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <script>
        function switchPage(pageId, element) {
            // Hide all sections, remove active class
            document.querySelectorAll('.page-section').forEach(section => {
                section.classList.add('hidden');
                section.classList.remove('active');
            });
            // Show target section
            const target = document.getElementById(pageId);
            target.classList.remove('hidden');
            target.classList.add('active');
            
            // Update nav
            document.querySelectorAll('.dosen-nav-item').forEach(item => {
                item.classList.remove('active');
            });
            element.classList.add('active');

            // Update Header Title
            const titleMap = {
                'dashboard': 'Dashboard',
                'mengajar': 'Mata Kuliah Saya',
                'input-nilai': 'Input Nilai',
                'pesan': 'Pesan & Tiket'
            };
            document.getElementById('page-title').innerText = titleMap[pageId] || 'Dashboard';
        }
    </script>
</body>
</html>
