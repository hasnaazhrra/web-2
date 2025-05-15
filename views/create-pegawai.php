<?php
include 'partials/navbar.php';
include 'partials/sidebar.php';
include '../../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $nip = $_POST['nip'];
    $jabatan = $_POST['jabatan'];

    $query = mysqli_query($koneksi, "INSERT INTO pegawai (nama, nip, jabatan) VALUES ('$nama', '$nip', '$jabatan')");

    if ($query) {
        echo "<script>alert('Pegawai berhasil ditambahkan'); window.location.href='list-pegawai.php';</script>";
    } else {
        echo "Gagal menambahkan data";
    }
}
?>

<div class="container mt-5">
    <h2>Tambah Pegawai</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Pegawai</label>
            <input type="text" class="form-control" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" class="form-control" name="nip" required>
        </div>
        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" class="form-control" name="jabatan" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<?php include 'partials/footer.php'; ?>
