<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'dosen') {
    header("Location: ../login.php");
    exit();
}
require_once '../config.php';

$user_id = $_SESSION['user_id'];

// ambil data dosen
$sqlDosen = "
    SELECT dosen_id, nama 
    FROM dosen 
    WHERE user_id = ?
";
$stmt = $conn->prepare($sqlDosen);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$dosen = $stmt->get_result()->fetch_assoc();

$dosen_id = $dosen['dosen_id'];
$nama_dosen = $dosen['nama'];

$sqlMk = "
    SELECT COUNT(*) AS total_mk
    FROM mata_kuliah
    WHERE dosen_id = ?
";
$stmt = $conn->prepare($sqlMk);
$stmt->bind_param("i", $dosen_id);
$stmt->execute();
$total_mk = $stmt->get_result()->fetch_assoc()['total_mk'];

$sqlMhs = "
    SELECT COUNT(DISTINCT krs.nim) AS total_mhs
    FROM mata_kuliah mk
    JOIN krs_detail kd ON mk.id_mk = kd.mata_kuliah_id
    JOIN krs ON kd.krs_id = krs.krs_id
    WHERE mk.dosen_id = ?
      AND krs.status = 'Disetujui'
";
$stmt = $conn->prepare($sqlMhs);
$stmt->bind_param("i", $dosen_id);
$stmt->execute();
$total_mhs = $stmt->get_result()->fetch_assoc()['total_mhs'];

$sqlMkList = "
    SELECT id_mk, nama_mk, sks
    FROM mata_kuliah
    WHERE dosen_id = ?
";
$stmt = $conn->prepare($sqlMkList);
$stmt->bind_param("i", $dosen_id);
$stmt->execute();
$mkResult = $stmt->get_result();

$stmtListMhs = $conn->prepare("
    SELECT DISTINCT 
        kd.mata_kuliah_id,
        m.nim,
        m.nama
    FROM krs_detail kd
    JOIN krs k ON kd.krs_id = k.krs_id
    JOIN mahasiswa m ON k.nim = m.nim
    WHERE k.status = 'Disetujui'
    ORDER BY m.nama
");
$stmtListMhs->execute();
$listMhsResult = $stmtListMhs->get_result();

$stmtAbsensi = $conn->prepare("
    SELECT 
        a.kode_mk,
        m.nim,
        m.nama,
        COUNT(CASE WHEN a.status = 'Hadir' THEN 1 END) AS hadir
    FROM absensi a
    JOIN mahasiswa m ON a.nim = m.nim
    GROUP BY a.kode_mk, m.nim, m.nama
    ORDER BY m.nama
");
$stmtAbsensi->execute();
$absensiResult = $stmtAbsensi->get_result();

?>
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
        </div>

        <a href="../logout.php" class="dosen-nav-item">
            <i class="ph ph-sign-out"></i> Keluar
        </a>
    </nav>

    <!-- Main Content -->
    <main class="dosen-main">

        <!-- Header -->
        <header class="dosen-header">
            <h2 class="text-xl font-bold text-slate-700" id="page-title">Dashboard</h2>
            <div class="flex items-center gap-4">
                <div class="flex items-center gap-2">
                    <div class="text-right">
                        <div class="font-bold text-sm text-slate-700"><?php echo htmlspecialchars($nama_dosen); ?></div>
                        <div class="text-xs text-slate-500"><?php echo htmlspecialchars($_SESSION['email']); ?></div>
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
                        <div class="text-2xl font-bold text-slate-800"><?= $total_mk ?></div>
                        <div class="text-sm text-slate-500">Kelas Aktif</div>
                    </div>
                </div>
                <!-- Stat 2 -->
                <div class="d-card flex items-center gap-4">
                    <div class="p-3 bg-green-100 text-green-600 rounded-lg">
                        <i class="ph-fill ph-check-circle text-2xl"></i>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-slate-800"><?= $total_mhs ?></div>
                        <div class="text-sm text-slate-500">Total Mahasiswa</div>
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
            </div>
        </section>

        <!-- PAGE: MENGAJAR -->
        <section id="mengajar" class="page-section hidden">
            <h3 class="text-xl font-bold mb-4 text-slate-700">
                Daftar Mata Kuliah yang Saya Ajar
            </h3>

            <div class="class-grid">

                <?php while ($mk = $mkResult->fetch_assoc()): ?>

                    <?php
                    // hitung jumlah mahasiswa per MK
                    $stmtMhs = $conn->prepare("
                        SELECT COUNT(DISTINCT krs.nim) total_mhs
                        FROM krs_detail kd
                        JOIN krs ON kd.krs_id = krs.krs_id
                        WHERE kd.mata_kuliah_id = ?
                        AND krs.status = 'Disetujui'
                    ");
                    $stmtMhs->bind_param("i", $mk['id_mk']);
                    $stmtMhs->execute();
                    $total_mhs = $stmtMhs->get_result()->fetch_assoc()['total_mhs'];
                    ?>

                    <div class="class-card">

                        <!-- Header -->
                        <div class="class-header">
                            <span><?= htmlspecialchars($mk['nama_mk']) ?></span>
                            <span class="bg-white px-2 rounded text-xs border border-slate-200 flex items-center">
                                <?= $mk['sks'] ?> SKS
                            </span>
                        </div>

                        <!-- Body -->
                        <div class="class-body">
                            <div class="text-sm text-slate-600 mb-4">
                                ID Mata Kuliah: <?= $mk['id_mk'] ?>
                            </div>

                            <div class="flex gap-2 text-xs">
                                <span class="bg-emerald-50 text-emerald-700 px-2 py-1 rounded">
                                    <?= $total_mhs ?> Mahasiswa
                                </span>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="class-actions">
                            <button class="action-btn"
                                onclick="openListMhs(<?= $mk['id_mk'] ?>, '<?= $mk['nama_mk'] ?>')">
                                List Mhs
                            </button>

                            <button class="action-btn"
                                onclick="openAbsensi(<?= $mk['id_mk'] ?>, '<?= $mk['nama_mk'] ?>')">
                                Absensi
                            </button>

                            <button class="action-btn"
                                onclick="switchPage('input-nilai', this)">
                                Nilai
                            </button>
                        </div>


                    </div>

                <?php endwhile; ?>

            </div>
        </section>

        <section id="mengajar-list-mhs" class="page-section hidden">
            <div class="d-card w-full">

                <div class="flex justify-between mb-4">
                    <h3 id="judul-list-mhs" class="text-xl font-bold"></h3>
                    <button class="btn-outline" onclick="backToMengajar()">← Kembali</button>
                </div>

                <table class="w-full border">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $listMhsResult->fetch_assoc()): ?>
                            <tr class="row-mhs"
                                data-mk="<?= $row['mata_kuliah_id'] ?>"
                                style="display:none">
                                <td><?= $row['nim'] ?></td>
                                <td><?= $row['nama'] ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>

            </div>
        </section>


        <section id="mengajar-absensi" class="page-section hidden">
            <div class="d-card w-full">

                <div class="flex justify-between items-center mb-4">
                    <h3 id="judul-absensi" class="text-xl font-bold text-slate-700"></h3>
                    <button class="btn-outline" onclick="backToMengajar()">← Kembali</button>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full border border-slate-200 text-sm">
                        <thead class="bg-slate-100 text-slate-700">
                            <tr>
                                <th class="border px-3 py-2 text-left">NIM</th>
                                <th class="border px-3 py-2 text-left">Nama Mahasiswa</th>
                                <th class="border px-3 py-2 text-center">Kehadiran</th>
                                <th class="border px-3 py-2 text-center">Persentase</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($a = $absensiResult->fetch_assoc()): ?>
                                <tr
                                    class="row-absen hover:bg-slate-50"
                                    data-mk="<?= $a['kode_mk'] ?>"
                                    style="display:none">
                                    <td class="border px-3 py-2"><?= $a['nim'] ?></td>
                                    <td class="border px-3 py-2"><?= $a['nama'] ?></td>
                                    <td class="border px-3 py-2 text-center">
                                        <?= $a['hadir'] ?>/10
                                    </td>
                                    <td class="border px-3 py-2 text-center">
                                        <?= round(($a['hadir'] / 10) * 100, 1) ?>%
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
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

        function hideAllPages() {
            document.querySelectorAll('.page-section').forEach(s => {
                s.classList.add('hidden');
                s.classList.remove('active');
            });
        }

        function backToMengajar() {
            hideAllPages();
            document.getElementById('mengajar').classList.remove('hidden');
        }

        function openListMhs(idMk, namaMk) {
            hideAllPages();
            document.getElementById('mengajar-list-mhs').classList.remove('hidden');
            document.getElementById('judul-list-mhs').innerText = 'Mahasiswa - ' + namaMk;

            document.querySelectorAll('.row-mhs').forEach(r => {
                r.style.display = r.dataset.mk == idMk ? '' : 'none';
            });
        }

        function openAbsensi(idMk, namaMk) {
            hideAllPages();
            document.getElementById('mengajar-absensi').classList.remove('hidden');
            document.getElementById('judul-absensi').innerText = 'Absensi - ' + namaMk;

            document.querySelectorAll('.row-absen').forEach(r => {
                r.style.display = r.dataset.mk == idMk ? '' : 'none';
            });
        }
    </script>
</body>

</html>