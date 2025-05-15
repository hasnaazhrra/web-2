<?php
include 'partials/navbar.php';
include 'partials/sidebar.php';
include '../../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_kartu = $_POST['nama_kartu'];
    $diskon = $_POST['diskon'];

    $query = mysqli_query($koneksi, "INSERT INTO kartu_diskon (nama_kartu, diskon) VALUES ('$nama_kartu', '$diskon')");

    if ($query) {
        echo "<script>alert('Kartu diskon berhasil ditambahkan'); window.location.href='list-kartu-diskon.php';</script>";
    } else {
        echo "Gagal menambahkan data";
    }
}
?>

<div class="container mt-5">
    <h2>Tambah Kartu Diskon</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="nama_kartu" class="form-label">Nama Kartu</label>
            <input type="text" class="form-control" name="nama_kartu" required>
        </div>
        <div class="mb-3">
            <label for="diskon" class="form-label">Diskon (%)</label>
            <input type="number" class="form-control" name="diskon" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<?php include 'partials/footer.php'; ?>
