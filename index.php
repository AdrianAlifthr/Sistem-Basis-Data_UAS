<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIA Vokasi - Login</title>
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
  </head>
  <body
    class="flex flex-col min-h-screen justify-center items-center"
    style="background: #f1f5f9"
  >
    <div class="container text-center mb-10">
      <h1 class="text-4xl font-bold mb-2 text-slate-900">
        Sistem Informasi Akademik
      </h1>
      <p class="text-lg text-slate-500">
        Fakultas Vokasi - Universitas Sumatera Utara
      </p>
    </div>

    <div class="landing-grid w-full">
      <!-- Mahasiswa -->
      <a href="login.php?role=mahasiswa" class="role-card role-mahasiswa group">
        <div class="role-icon">
          <i class="ph-fill ph-student"></i>
        </div>
        <h2>Mahasiswa</h2>
        <p>Login untuk melihat KHS, KRS, Jadwal, dan Absensi.</p>
        <div
          class="mt-6 flex items-center text-sm font-semibold"
          style="color: var(--mhs-primary)"
        >
          Masuk sebagai Mahasiswa
          <i
            class="ph-bold ph-arrow-right ml-2 opacity-0 group-hover:opacity-100 transition-opacity"
          ></i>
        </div>
      </a>

      <!-- Dosen -->
      <a href="login.php?role=dosen" class="role-card role-dosen group">
        <div class="role-icon">
          <i class="ph-fill ph-chalkboard-teacher"></i>
        </div>
        <h2>Dosen</h2>
        <p>Kelola kelas, input nilai, absensi, dan materi ajar.</p>
        <div
          class="mt-6 flex items-center text-sm font-semibold"
          style="color: var(--dosen-primary)"
        >
          Masuk sebagai Dosen
          <i
            class="ph-bold ph-arrow-right ml-2 opacity-0 group-hover:opacity-100 transition-opacity"
          ></i>
        </div>
      </a>

      <!-- Kaprodi -->
      <a href="login.php?role=kaprodi" class="role-card role-kaprodi group">
        <div class="role-icon">
          <i class="ph-fill ph-briefcase"></i>
        </div>
        <h2>Kaprodi</h2>
        <p>Monitoring kurikulum, kinerja dosen, dan statistik prodi.</p>
        <div
          class="mt-6 flex items-center text-sm font-semibold"
          style="color: var(--prodi-primary)"
        >
          Masuk sebagai Kaprodi
          <i
            class="ph-bold ph-arrow-right ml-2 opacity-0 group-hover:opacity-100 transition-opacity"
          ></i>
        </div>
      </a>

      <!-- Orang Tua -->
      <a href="login.php?role=orangtua" class="role-card role-ortu group">
        <div class="role-icon">
          <i class="ph-fill ph-users-three"></i>
        </div>
        <h2>Orang Tua</h2>
        <p>Pantau perkembangan akademik dan kehadiran putra-putri Anda.</p>
        <div
          class="mt-6 flex items-center text-sm font-semibold"
          style="color: var(--ortu-primary)"
        >
          Masuk sebagai Orang Tua
          <i
            class="ph-bold ph-arrow-right ml-2 opacity-0 group-hover:opacity-100 transition-opacity"
          ></i>
        </div>
      </a>
    </div>

    <footer class="mt-12 text-slate-400 text-sm">
      &copy; 2024 Vokasi USU. Project SBD 2.
    </footer>
  </body>
</html>
