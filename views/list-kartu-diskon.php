<?php
include 'partials/navbar.php';
include 'partials/sidebar.php';
include '../../config/koneksi.php';

$query = mysqli_query($koneksi, "SELECT * FROM kartu_diskon");
?>

<div class="container mt-5">
    <h2>Daftar Kartu Diskon</h2>
    <a href="create-kartu-diskon.php" class="btn btn-primary mb-3">Tambah Kartu</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kartu</th>
                <th>Persentase</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; while ($data = mysqli_fetch_assoc($query)) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['nama_kartu'] ?></td>
                <td><?= $data['persentase'] ?>%</td>
                <td>
                    <a href="detail-kartu-diskon.php?id=<?= $data['id'] ?>" class="btn btn-info btn-sm">Detail</a>
                    <a href="edit-kartu-diskon.php?id=<?= $data['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete-kartu-diskon.php?id=<?= $data['id'] ?>" class="btn btn-danger btn-sm"
                       onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include 'partials/footer.php'; ?>

