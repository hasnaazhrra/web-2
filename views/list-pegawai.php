<?php
include 'partials/navbar.php';
include 'partials/sidebar.php';
include '../../config/koneksi.php';

$query = mysqli_query($koneksi, "SELECT * FROM pegawai");
?>

<div class="container mt-5">
    <h2>Daftar Pegawai</h2>
    <a href="create-pegawai.php" class="btn btn-primary mb-3">Tambah Pegawai</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>No HP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; while ($data = mysqli_fetch_assoc($query)) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['jabatan'] ?></td>
                <td><?= $data['no_hp'] ?></td>
                <td>
                    <a href="detail-pegawai.php?id=<?= $data['id'] ?>" class="btn btn-info btn-sm">Detail</a>
                    <a href="edit-pegawai.php?id=<?= $data['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete-pegawai.php?id=<?= $data['id'] ?>" class="btn btn-danger btn-sm"
                       onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include 'partials/footer.php'; ?>

