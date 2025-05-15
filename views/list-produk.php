<?php
include 'partials/navbar.php';
include 'partials/sidebar.php';
include '../../config/koneksi.php';

$query = mysqli_query($koneksi, "
    SELECT p.*, j.nama_jenis 
    FROM produk p 
    JOIN jenis_produk j ON p.id_jenis_produk = j.id
");
?>

<div class="container mt-5">
    <h2>Daftar Produk</h2>
    <a href="create-produk.php" class="btn btn-primary mb-3">Tambah Produk</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Jenis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; while ($data = mysqli_fetch_assoc($query)) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['nama_produk'] ?></td>
                <td><?= number_format($data['harga']) ?></td>
                <td><?= $data['stok'] ?></td>
                <td><?= $data['nama_jenis'] ?></td>
                <td>
                    <a href="detail-produk.php?id=<?= $data['id'] ?>" class="btn btn-info btn-sm">Detail</a>
                    <a href="edit-produk.php?id=<?= $data['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete-produk.php?id=<?= $data['id'] ?>" class="btn btn-danger btn-sm"
                       onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include 'partials/footer.php'; ?>

