<?php
include 'partials/navbar.php';
include 'partials/sidebar.php';
include '../../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_jenis = $_POST['nama_jenis'];

    $query = mysqli_query($koneksi, "INSERT INTO jenis_produk (nama_jenis) VALUES ('$nama_jenis')");

    if ($query) {
        echo "<script>alert('Data berhasil ditambahkan'); window.location.href='list-jenis-produk.php';</script>";
    } else {
        echo "Gagal menambahkan data";
    }
}
?>

<div class="container mt-5">
    <h2>Tambah Jenis Produk</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="nama_jenis" class="form-label">Nama Jenis Produk</label>
            <input type="text" class="form-control" name="nama_jenis" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<?php include 'partials/footer.php'; ?>
