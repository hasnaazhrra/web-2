<?php
include 'partials/navbar.php';
include 'partials/sidebar.php';
include '../../config/koneksi.php';

$query = mysqli_query($koneksi, "SELECT * FROM anggota");
?>

<div class="container mt-5">
    <h2>Daftar Anggota</h2>
    <a href="create-anggota.php" class="btn btn-primary mb-3">Tambah Anggota</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; while ($data = mysqli_fetch_assoc($query)) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['alamat'] ?></td>
                <td><?= $data['no_hp'] ?></td>
                <td>
                    <a href="detail-anggota.php?id=<?= $data['id'] ?>" class="btn btn-info btn-sm">Detail</a>
                    <a href="edit-anggota.php?id=<?= $data['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete-anggota.php?id=<?= $data['id'] ?>" class="btn btn-danger btn-sm"
                       onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include 'partials/footer.php'; ?>
