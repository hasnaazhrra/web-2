<?php
include_once 'top.php';
require_once __DIR__ . '/../database.php'; // Pastikan path ini sesuai

// Ambil data pegawai yang belum jadi anggota
$stmtPegawai = $pdo->query("SELECT * FROM pegawai WHERE id NOT IN (SELECT pegawai_id FROM anggota)");
$pegawaiList = $stmtPegawai->fetchAll(PDO::FETCH_ASSOC);

// Ambil data kartu diskon
$stmtDiskon = $pdo->query("SELECT * FROM kartu_diskon");
$diskonList = $stmtDiskon->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="app-wrapper">
  <?php include_once 'navbar.php'; ?>
  <?php include_once 'sidebar.php'; ?>

  <main class="app-main">
    <div class="app-content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6"><h3 class="mb-0">Tambah Anggota</h3></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Anggota</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="app-content">
      <div class="col-md-12">
        <div class="card card-success card-outline mb-4">
          <div class="card-header">
            <div class="card-title">Tambah Anggota</div>
          </div>
          <div class="card-body">
            <form action="anggota_proses.php" method="POST">
              <div class="mb-3">
                <label class="form-label">Pegawai</label>
                <select class="form-select" name="pegawai_id" required>
                  <option value="">Pilih Pegawai</option>
                  <?php foreach ($pegawaiList as $pegawai): ?>
                    <option value="<?= $pegawai['id'] ?>">
                      <?= htmlspecialchars($pegawai['nip']) ?> - <?= htmlspecialchars($pegawai['nama']) ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label">Kartu Diskon</label>
                <select class="form-select" name="kartu_diskon_id">
                  <option value="">Tidak ada diskon</option>
                  <?php foreach ($diskonList as $diskon): ?>
                    <option value="<?= $diskon['id'] ?>">
                      <?= htmlspecialchars($diskon['nama']) ?> (<?= $diskon['persen_diskon'] ?>%)
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label">Status Keanggotaan</label>
                <select class="form-select" name="status_aktif" required>
                  <option value="aktif" selected>Aktif</option>
                  <option value="non_aktif">Non-Aktif</option>
                </select>
              </div>

              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="anggota_list.php" class="btn btn-secondary">Kembali</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php include_once 'footer.php'; ?>
</div>
