<?php
include_once 'top.php';
session_start(); // Tambahkan baris ini
require_once __DIR__ . '/../database.php'; // Ubah path sesuai struktur proyek Anda


// Ambil data anggota menggunakan PDO
$query = "SELECT a.*, p.nip, p.nama, p.jabatan, k.nama as kartu_diskon, k.persen_diskon
          FROM anggota a
          JOIN pegawai p ON a.pegawai_id = p.id
          LEFT JOIN kartu_diskon k ON a.kartu_diskon_id = k.id
          ORDER BY p.nama ASC";
 // Mengurutkan berdasarkan tanggal penambahan

$stmt = $pdo->query($query);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="app-wrapper">
  <?php include_once 'navbar.php'; ?>
  <?php include_once 'sidebar.php'; ?>

  <main class="app-main">
    <div class="app-content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6"><h3 class="mb-0">Daftar Anggota</h3></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Daftar Anggota</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="app-content">
            <div class="col-md-12">
                <div class="card card-primary card-outline mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Detail Data Anggota</h3>
                        <div class="card-tools">
                            <ul class="pagination pagination-sm float-end">
                            <a href="anggota_tambah.php" class="btn btn-primary mb-3">Tambah Anggota</a>
                            </ul>
                        </div>
                    </div>
        
        
        <!-- <a href="anggota_tambah.php" class="btn btn-primary mb-3">Tambah Anggota</a> -->
        <?php if (isset($_GET['sukses'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <?php
                if ($_GET['sukses'] == 'tambah') echo "Data anggota berhasil ditambahkan!";
                elseif ($_GET['sukses'] == 'update') echo "Data anggota berhasil diperbarui!";
              ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
          <?php elseif (isset($_GET['hapus']) && $_GET['hapus'] == 'sukses'): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              Data anggota berhasil dihapus!
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>


        <table class="table ">
          <thead>
            <tr>
              <th>NO</th>
              <th>NIP</th>
              <th>Nama</th>
              <th>Jabatan</th>
              <th>Status</th>
              <th>Diskon</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (count($data) > 0): $no = 1; ?>
              <?php foreach ($data as $row): ?>
                <?php
                  $status = $row['status_aktif'];
                  $badge_class = $status == 'aktif' ? 'badge-aktif' : 'badge-non_aktif';
                  $status_text = $status == 'aktif' ? 'Aktif' : 'Non-Aktif';

                  $diskon_text = '-';
                  if (!empty($row['kartu_diskon'])) {
                    $diskon_text = "{$row['kartu_diskon']} ({$row['persen_diskon']}%)";
                  }
                ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= htmlspecialchars($row['nip']); ?></td>
                  <td><?= htmlspecialchars($row['nama']); ?></td>
                  <td><?= htmlspecialchars($row['jabatan']); ?></td>
                  <td><span class="badge <?= $badge_class ?>"><?= $status_text ?></span></td>
                  <td><?= $diskon_text ?></td>
                  <td>
                    <a href="anggota_edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="anggota_proses.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirmHapus()">Hapus</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr><td colspan="7" class="text-center">Tidak ada data anggota</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
    </div>
  </main>

  <?php include_once 'footer.php'; ?>
</div>

<script>
function confirmHapus() {
    return confirm('Apakah Anda yakin ingin menghapus data anggota ini?');
}
</script>
