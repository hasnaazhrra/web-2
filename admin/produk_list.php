<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../database.php';
include_once 'top.php';

// use Dotenv\Dotenv;

// $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
// $dotenv->load();

// Ambil data produk
$query = "SELECT p.*, j.nama AS jenis FROM produk p 
          JOIN jenis_produk j ON p.jenis_produk_id = j.id";
$stmt = $pdo->query($query);
$produk = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="app-wrapper">
    <?php include_once 'navbar.php'; ?>
    <?php include_once 'sidebar.php'; ?>

    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6"><h3 class="mb-0">Daftar Produk</h3></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Daftar Produk</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-content">
            <div class="card mb-4">
                <div class="card-header">
                    <button data-bs-toggle="modal" data-bs-target="#tambahProduk" class="btn btn-primary">Tambah Produk</button>
                </div>
                <div class="card-body p-3">
                    <!-- Menambahkan alert jika ada status -->
                    <?php if (isset($_GET['sukses'])): ?>
                        <div class="alert alert-<?php echo ($_GET['sukses'] == 'tambah' || $_GET['sukses'] == 'update' || $_GET['sukses'] == 'hapus') ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
                            <?php
                            if ($_GET['sukses'] == 'tambah') {
                                echo "Produk berhasil ditambahkan!";
                            } elseif ($_GET['sukses'] == 'update') {
                                echo "Produk berhasil diupdate!";
                            } elseif ($_GET['sukses'] == 'hapus') {
                                echo "Produk berhasil dihapus!";
                            } else {
                                echo "Terjadi kesalahan: " . $_GET['error'];
                            }
                            ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Jenis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($produk as $row) {
                                echo "<tr>
                                    <td>{$no}</td>
                                    <td>{$row['kode']}</td>
                                    <td>{$row['nama']}</td>
                                    <td>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>
                                    <td>{$row['stok']}</td>
                                    <td>{$row['jenis']}</td>
                                    <td>
                                        <a href='produk_edit.php?id={$row['id']}' class='btn btn-sm btn-warning'>Edit</a>
                                        <a href='produk_hapus.php?hapus_id={$row['id']}' class='btn btn-sm btn-danger' onclick='return confirm(\"Yakin ingin menghapus produk ini?\")'>Hapus</a>
                                    </td>
                                </tr>";
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <?php include_once 'footer.php'; ?>
</div>


<!-- Modal Tambah Produk -->
<div class="modal fade" id="tambahProduk" tabindex="-1" aria-labelledby="tambahProdukLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="produk_proses.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahProdukLabel">Tambah Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Kode Produk</label>
                        <input type="text" class="form-control" name="kode" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga</label>
                        <input type="number" class="form-control" name="harga" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stok</label>
                        <input type="number" class="form-control" name="stok" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Produk</label>
                        <select class="form-select" name="jenis_produk_id" required>
                            <?php
                            $stmtJenis = $pdo->query("SELECT * FROM jenis_produk");
                            while ($row = $stmtJenis->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value='{$row['id']}'>{$row['nama']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
