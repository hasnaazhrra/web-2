<?php
include 'partials/navbar.php';
include 'partials/sidebar.php';
include '../../config/koneksi.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $nip = $_POST['nip'];
    $jabatan = $_POST['jabatan'];

    $query = mysqli_query($koneksi, "UPDATE pegawai SET nama = '$nama', nip = '$nip', jabatan = '$jabatan' WHERE id = $id");

    if ($query) {
        echo "<script>alert('Pegawai berhasil diupdate'); window.location.href='list-pegawai.php';</script>";
    } else {
        echo "Gagal mengupdate data";
    }
}

$query = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id = $id");
$data = mysqli_fetch_assoc($query);
?>

<div class="container mt-5">
    <h2>Edit Pegawai</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Pegawai</label>
            <input type="text" class="form-control" name="nama" value="<?= $data['nama'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" class="form-control" name="nip" value="<?= $data['nip'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" class="form-control" name="jabatan" value="<?= $data['jabatan'] ?>" required>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
    </form>
</div>

<?php include 'partials/footer.php'; ?>

