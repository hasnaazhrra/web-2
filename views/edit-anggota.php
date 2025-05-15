<?php
include 'partials/navbar.php';
include 'partials/sidebar.php';
include '../../config/koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id = $id");
$data = mysqli_fetch_assoc($query);
?>

<div class="container mt-5">
    <h2>Edit Anggota</h2>
    <form action="../../controllers/anggota/update.php" method="POST">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" value="<?= $data['nama'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" name="alamat" value="<?= $data['alamat'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="no_telp" class="form-label">No Telepon</label>
            <input type="text" class="form-control" name="no_telp" value="<?= $data['no_telp'] ?>" required>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
    </form>
</div>

<?php include 'partials/footer.php'; ?>
