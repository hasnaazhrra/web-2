<?php
include 'partials/navbar.php';
include 'partials/sidebar.php';
include '../../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_anggota = $_POST['id_anggota'];
    $id_produk = $_POST['id_produk'];
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];

    $query = mysqli_query($koneksi, "INSERT INTO pesanan (id_anggota, id_produk, jumlah, tanggal) 
                                     VALUES ('$id_anggota', '$id_produk', '$jumlah', '$tanggal')");

    if ($query) {
        echo "<script>alert('Pesanan berhasil ditambahkan'); window.location.href='list-pesanan.php';</script>";
    } else {
        echo "Gagal menambahkan data";
    }
}

// Ambil data anggota dan produk untuk dropdown
$anggota = mysqli_query($koneksi, "SELECT id, nama FROM anggota");
$produk = mysqli_query($koneksi, "SELECT id, nama_produk FROM produk");
?>

<div class="container mt-5">
    <h2>Tambah Pesanan</h2>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Anggota</label>
            <select class="form-control" name="id_anggota" required>
                <option value="">Pilih Anggota</option>
                <?php while($a = mysqli_fetch_assoc($anggota)) : ?>
                    <option value="<?= $a['id'] ?>"><?= $a['nama'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Produk</label>
            <select class="form-control" name="id_produk" required>
                <option value="">Pilih Produk</option>
                <?php while($p = mysqli_fetch_assoc($produk)) : ?>
                    <option value="<?= $p['id'] ?>"><?= $p['nama_produk'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<?php include 'partials/footer.php'; ?>
