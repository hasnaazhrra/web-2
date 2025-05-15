<?php
include 'partials/navbar.php';
include 'partials/sidebar.php';
?>

<div class="container mt-5">
    <h2>Tambah Anggota</h2>
    <form action="../../controllers/anggota/store.php" method="POST">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" name="alamat" required>
        </div>
        <div class="mb-3">
            <label for="no_telp" class="form-label">No Telepon</label>
            <input type="text" class="form-control" name="no_telp" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<?php include 'partials/footer.php'; ?>
