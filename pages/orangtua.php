<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring Orang Tua - SIA Vokasi</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/orangtua.css">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>
<body class="role-orangtua">

    <!-- Sidebar -->
    <nav class="ortu-sidebar">
        <div class="ortu-logo">
            <i class="ph-duotone ph-plant"></i>
            <span>Portal Orang Tua</span>
        </div>
        
        <div class="flex-1">
            <a href="#" class="ortu-nav-item active" onclick="switchPage('dashboard', this)">
                <i class="ph ph-squares-four"></i> Dashboard
            </a>
            <a href="#" class="ortu-nav-item" onclick="switchPage('profile', this)">
                <i class="ph ph-user"></i> Profil
            </a>
            <a href="#" class="ortu-nav-item" onclick="switchPage('monitoring', this)">
                <i class="ph ph-chart-line-up"></i> Monitoring Anak
            </a>
            <a href="#" class="ortu-nav-item" onclick="switchPage('absensi', this)">
                <i class="ph ph-clock"></i> Kehadiran Anak
            </a>
            <a href="#" class="ortu-nav-item" onclick="switchPage('nilai', this)">
                <i class="ph ph-exam"></i> Nilai Anak
            </a>
             <a href="#" class="ortu-nav-item" onclick="switchPage('prestasi', this)">
                <i class="ph ph-medal"></i> Prestasi Anak
            </a>
             <a href="#" class="ortu-nav-item" onclick="switchPage('pengumuman', this)">
                <i class="ph ph-megaphone"></i> Pengumuman
            </a>
            <a href="#" class="ortu-nav-item" onclick="switchPage('bantuan', this)">
                <i class="ph ph-question"></i> Bantuan
            </a>
        </div>

        <a href="../index.html" class="ortu-nav-item" style="color: #ef4444;">
            <i class="ph ph-sign-out"></i> Logout
        </a>
    </nav>

    <!-- Main Content -->
    <main class="ortu-main">
        
        <header class="ortu-header">
            <h2 id="page-title">Dashboard Monitoring</h2>
            <p class="text-slate-500">Selamat Datang, Bapak/Ibu Wali Mahasiswa</p>
        </header>

        <!-- PAGE: DASHBOARD -->
        <section id="dashboard" class="page-section active">
            
            <!-- Child Summary Card -->
            <div class="child-profile">
                <div class="child-avatar">AD</div>
                <div class="child-info flex-1">
                    <h2>Adrian Alifa</h2>
                    <div class="text-slate-500">NIM: 220101010 • D3 Teknik Informatika • Semester 4</div>
                        <div class="flex gap-4 mt-2">
                        <span class="status-indicator status-good">Status: Aktif</span>
                        <span class="status-indicator status-good">KRS: Disetujui</span>
                    </div>
                </div>
                    <div class="text-right">
                    <div class="text-sm text-slate-500">IPK Terakhir</div>
                    <div class="text-3xl font-bold text-green-700">3.65</div>
                </div>
            </div>

            <div class="monitor-grid">
                <!-- Notifications/Alerts -->
                <div class="m-card">
                    <h3><i class="ph-fill ph-bell-ringing text-amber-500"></i> Notifikasi Penting</h3>
                    <div class="bg-red-50 border border-red-200 rounded-lg p-3 mb-3">
                         <h4 class="font-bold text-red-800 text-sm">Peringatan Kehadiran!</h4>
                         <p class="text-xs text-red-700 mt-1">Absensi mata kuliah <b>Jaringan Komputer</b> di bawah 75%.</p>
                    </div>
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-3">
                         <h4 class="font-bold text-blue-800 text-sm">Pembayaran SPP</h4>
                         <p class="text-xs text-blue-700 mt-1">Batas pembayaran SPP Semester 5 adalah 20 Agustus 2025.</p>
                    </div>
                </div>

                <!-- Kontak Dosen -->
                <div class="m-card">
                    <h3>Kontak Dosen Wali</h3>
                    <div class="contact-card">
                        <div class="font-bold text-lg">Dr. Rina Wati, M.Kom</div>
                        <div class="text-sm text-slate-600 mb-2">Dosen Wali Kelas TI-4A</div>
                         <div class="flex gap-2 mt-4">
                             <button class="bg-white border rounded px-3 py-2 text-sm font-semibold flex items-center gap-1 w-full justify-center hover:bg-green-50 text-green-700 border-green-200"><i class="ph-bold ph-whatsapp-logo"></i> WhatsApp</button>
                             <button class="bg-white border rounded px-3 py-2 text-sm font-semibold flex items-center gap-1 w-full justify-center hover:bg-blue-50 text-blue-700 border-blue-200"><i class="ph-bold ph-envelope"></i> Email</button>
                         </div>
                    </div>
                </div>
            </div>
            
            <h3 class="font-bold text-xl my-4 text-slate-700">Ringkasan Akademik</h3>
            <div class="monitor-grid">
                 <!-- Summary Nilai -->
                 <div class="m-card">
                    <h3>
                        <span>Nilai Terbaru</span>
                        <button onclick="switchPage('nilai', document.querySelectorAll('.ortu-nav-item')[4])" class="text-sm text-blue-600">Lihat Detail</button>
                    </h3>
                    <div class="simple-list-item">
                        <div><div class="font-bold">Pemrograman Web</div><div class="text-xs text-slate-500">Tugas 1</div></div>
                        <div class="grade-box bg-green-50 border-green-200 text-green-700">85</div>
                    </div>
                    <div class="simple-list-item">
                        <div><div class="font-bold">Basis Data 2</div><div class="text-xs text-slate-500">UTS</div></div>
                        <div class="grade-box bg-green-50 border-green-200 text-green-700">88</div>
                    </div>
                </div>

                 <!-- Summary Absensi -->
                 <div class="m-card">
                    <h3>
                        <span>Kehadiran Minggu Ini</span>
                         <button onclick="switchPage('absensi', document.querySelectorAll('.ortu-nav-item')[3])" class="text-sm text-blue-600">Lihat Detail</button>
                    </h3>
                    <div class="simple-list-item">
                        <div><div class="font-bold">Senin</div><div class="text-xs text-slate-500">Pemrograman Web</div></div>
                        <span class="status-indicator status-good">Hadir</span>
                    </div>
                     <div class="simple-list-item">
                        <div><div class="font-bold">Rabu</div><div class="text-xs text-slate-500">Jaringan Komputer</div></div>
                        <span class="status-indicator status-bad">Alpha</span>
                    </div>
                </div>
            </div>

        </section>

        <!-- PAGE: PROFILE -->
        <section id="profile" class="page-section hidden">
            <div class="m-card max-w-2xl">
                <h3 class="mb-4 font-bold text-slate-700">Data Orang Tua / Wali</h3>
                <div class="profile-detail-item">
                    <span class="profile-label">Nama Lengkap</span>
                    <span class="profile-value">Bapak Budi Santoso</span>
                </div>
                <div class="profile-detail-item">
                    <span class="profile-label">Hubungan</span>
                    <span class="profile-value">Ayah Kandung</span>
                </div>
                <div class="profile-detail-item">
                    <span class="profile-label">Nomor Telepon</span>
                    <span class="profile-value">0812-3456-7890</span>
                </div>
                <div class="profile-detail-item">
                    <span class="profile-label">Alamat</span>
                    <span class="profile-value text-right">Jl. Dr. Mansyur No. 9, Medan, Sumatera Utara</span>
                </div>
            </div>
             <div class="m-card max-w-2xl mt-6">
                <h3 class="mb-4 font-bold text-slate-700">Data Mahasiswa</h3>
                 <div class="profile-detail-item">
                    <span class="profile-label">NIM</span>
                    <span class="profile-value">220101010</span>
                </div>
                 <div class="profile-detail-item">
                    <span class="profile-label">Program Studi</span>
                    <span class="profile-value">D3 Teknik Informatika</span>
                </div>
            </div>
        </section>

        <!-- PAGE: MONITORING -->
        <section id="monitoring" class="page-section hidden">
            <div class="grid grid-cols-3 gap-6 mb-6">
                <div class="m-card text-center">
                    <div class="text-slate-500 text-sm mb-1">IPK Kumulatif</div>
                    <div class="text-3xl font-bold text-slate-800">3.65</div>
                </div>
                <div class="m-card text-center">
                    <div class="text-slate-500 text-sm mb-1">Total SKS Lulus</div>
                    <div class="text-3xl font-bold text-green-600">84</div>
                </div>
                <div class="m-card text-center">
                    <div class="text-slate-500 text-sm mb-1">Sisa Masa Studi</div>
                    <div class="text-3xl font-bold text-blue-600">2 Sem</div>
                </div>
            </div>
            
            <div class="m-card">
                 <h3 class="mb-4">Grafik Perkembangan IPK</h3>
                 <div class="w-full h-48 bg-slate-50 rounded border border-dashed border-slate-300 flex items-center justify-center text-slate-400">
                     [Grafik Line Chart IPK Semester 1 - 4]
                 </div>
            </div>
        </section>

        <!-- PAGE: ABSENSI -->
        <section id="absensi" class="page-section hidden">
            <div class="m-card mb-6">
                 <h3 class="font-bold text-xl mb-4">Rekap Kehadiran Semester Ini</h3>
                 <table style="width:100%; text-align:left; border-collapse:collapse;">
                     <thead class="bg-slate-50 border-b">
                         <tr>
                             <th class="p-3 text-sm text-slate-600">Mata Kuliah</th>
                             <th class="p-3 text-sm text-slate-600">Hadir</th>
                             <th class="p-3 text-sm text-slate-600">Izin</th>
                             <th class="p-3 text-sm text-slate-600">Alpha</th>
                             <th class="p-3 text-sm text-slate-600">Persentase</th>
                         </tr>
                     </thead>
                     <tbody>
                         <tr class="border-b">
                             <td class="p-3 font-medium">Pemrograman Web Lanjut</td>
                             <td class="p-3">14</td>
                             <td class="p-3">0</td>
                             <td class="p-3">0</td>
                             <td class="p-3 font-bold text-green-600">100%</td>
                         </tr>
                          <tr class="border-b">
                             <td class="p-3 font-medium">Basis Data 2</td>
                             <td class="p-3">12</td>
                             <td class="p-3">2</td>
                             <td class="p-3">0</td>
                             <td class="p-3 font-bold text-amber-500">85%</td>
                         </tr>
                          <tr class="border-b">
                             <td class="p-3 font-medium">Jaringan Komputer</td>
                             <td class="p-3">8</td>
                             <td class="p-3">0</td>
                             <td class="p-3">6</td>
                             <td class="p-3 font-bold text-red-600">60%</td>
                         </tr>
                     </tbody>
                 </table>
            </div>
        </section>

        <!-- PAGE: NILAI -->
        <section id="nilai" class="page-section hidden">
             <div class="m-card">
               <h3 class="font-bold text-xl mb-4">Laporan Nilai Semester Ini</h3>
               <table style="width:100%; text-align:left; font-size:0.9rem; border-collapse:collapse;">
                   <thead class="border-b bg-slate-50">
                       <tr>
                           <th class="p-3">Mata Kuliah</th>
                           <th class="p-3">UTS</th>
                           <th class="p-3">UAS</th>
                           <th class="p-3">Nilai Akhir</th>
                           <th class="p-3">Grade</th>
                       </tr>
                   </thead>
                   <tbody>
                       <tr class="border-b">
                           <td class="p-3">Pemrograman Web</td>
                           <td class="p-3">88</td>
                           <td class="p-3">-</td>
                           <td class="p-3 font-bold">-</td>
                            <td class="p-3">-</td>
                       </tr>
                       <tr class="border-b">
                           <td class="p-3">Basis Data 2</td>
                           <td class="p-3">85</td>
                           <td class="p-3">-</td>
                           <td class="p-3 font-bold">-</td>
                            <td class="p-3">-</td>
                       </tr>
                       <tr class="border-b">
                           <td class="p-3">Jaringan Komputer</td>
                           <td class="p-3 text-red-600 font-bold">40</td>
                           <td class="p-3">-</td>
                           <td class="p-3 font-bold">-</td>
                            <td class="p-3 text-red-600">E (Prediksi)</td>
                       </tr>
                   </tbody>
               </table>
            </div>
        </section>

        <!-- PAGE: PRESTASI -->
        <section id="prestasi" class="page-section hidden">
            <div class="m-card">
                 <div class="flex items-center gap-4 mb-6 pb-4 border-b">
                     <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center text-yellow-600 text-2xl">
                         <i class="ph-fill ph-trophy"></i>
                     </div>
                     <div>
                         <h3 class="font-bold text-lg m-0 p-0 border-none">Juara 1 Hackathon Mahasiswa 2024</h3>
                         <div class="text-slate-500 text-sm">Tingkat Nasional • Diselenggarakan oleh Kemdikbud</div>
                     </div>
                 </div>
                 <div class="flex items-center gap-4">
                     <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 text-2xl">
                         <i class="ph-fill ph-certificate"></i>
                     </div>
                     <div>
                         <h3 class="font-bold text-lg m-0 p-0 border-none">Sertifikasi Junior Web Developer</h3>
                         <div class="text-slate-500 text-sm">BNSP RI • 2023</div>
                     </div>
                 </div>
            </div>
        </section>

        <!-- PAGE: PENGUMUMAN -->
        <section id="pengumuman" class="page-section hidden">
            <div class="space-y-4">
                <div class="m-card">
                    <div class="text-xs text-slate-500 mb-1">10 Agustus 2025</div>
                    <h3 class="font-bold text-lg mb-2 border-none p-0">Jadwal Pembayaran SPP Tahap 2</h3>
                    <p class="text-slate-600 text-sm">Diberitahukan kepada seluruh orang tua mahasiswa bahwa pembayaran SPP tahap 2 akan dimulai pada tanggal...</p>
                </div>
                <div class="m-card">
                    <div class="text-xs text-slate-500 mb-1">1 Agustus 2025</div>
                    <h3 class="font-bold text-lg mb-2 border-none p-0">Undangan Rapat Orang Tua</h3>
                    <p class="text-slate-600 text-sm">Mengundang Bapak/Ibu untuk hadir dalam pertemuan semester yang akan dilaksanakan di Aula...</p>
                </div>
            </div>
        </section>

         <!-- PAGE: BANTUAN -->
         <section id="bantuan" class="page-section hidden">
            <div class="m-card mb-6">
                <h3 class="mb-4">FAQ (Pertanyaan Umum)</h3>
                <div class="space-y-4">
                    <details class="group bg-slate-50 p-4 rounded-lg">
                        <summary class="font-semibold cursor-pointer list-none flex justify-between items-center text-slate-700">
                            Bagaimana cara menghubungi dosen wali?
                            <i class="ph-bold ph-caret-down transition group-open:rotate-180"></i>
                        </summary>
                        <p class="text-slate-600 mt-2 text-sm leading-relaxed">Anda dapat melihat kontak dosen wali di halaman Dashboard utama.</p>
                    </details>
                     <details class="group bg-slate-50 p-4 rounded-lg">
                        <summary class="font-semibold cursor-pointer list-none flex justify-between items-center text-slate-700">
                            Mengapa nilai anak saya belum keluar?
                            <i class="ph-bold ph-caret-down transition group-open:rotate-180"></i>
                        </summary>
                        <p class="text-slate-600 mt-2 text-sm leading-relaxed">Nilai biasanya diinput oleh dosen paling lambat 2 minggu setelah ujian. Jika belum ada, mohon hubungi bagian akademik.</p>
                    </details>
                </div>
            </div>

            <div class="m-card">
                <h3 class="mb-4">Hubungi Admin Akademik</h3>
                <p class="text-sm text-slate-600 mb-4">Jika ada kendala teknis atau pertanyaan lain.</p>
                <div class="flex gap-4">
                    <div class="flex items-center gap-3 bg-slate-50 p-3 rounded-lg flex-1">
                        <div class="bg-white p-2 rounded shadow-sm"><i class="ph-fill ph-phone text-green-600"></i></div>
                        <div>
                            <div class="text-xs text-slate-500">Telepon</div>
                            <div class="font-bold text-slate-700">(061) 123-4567</div>
                        </div>
                    </div>
                     <div class="flex items-center gap-3 bg-slate-50 p-3 rounded-lg flex-1">
                        <div class="bg-white p-2 rounded shadow-sm"><i class="ph-fill ph-envelope text-blue-600"></i></div>
                        <div>
                            <div class="text-xs text-slate-500">Email</div>
                            <div class="font-bold text-slate-700">akademik@vokasi.usu.ac.id</div>
                        </div>
                    </div>
                </div>
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

            document.querySelectorAll('.ortu-nav-item').forEach(i => i.classList.remove('active'));
            if(element) element.classList.add('active');

             const titleMap = {
                'dashboard': 'Dashboard Monitoring',
                'profile': 'Profil Pengguna',
                'monitoring': 'Monitoring Akademik',
                'absensi': 'Kehadiran Anak',
                'nilai': 'Nilai Akademik Anak',
                'prestasi': 'Prestasi & Penghargaan',
                'pengumuman': 'Pengumuman Fakultas',
                'bantuan': 'Pusat Bantuan'
            };
            document.getElementById('page-title').innerText = titleMap[pageId] || 'Dashboard';
        }
    </script>
</body>
</html>
