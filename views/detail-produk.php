<?php
include 'partials/navbar.php';
include 'partials/sidebar.php';
include '../../config/koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($koneksi, "
    SELECT p.*, j.nama_jenis 
    FROM produk p 
    JOIN jenis_produk j ON p.id_jenis_produk = j.id 
    WHERE p.id = $id
");
$data = mysqli_fetch_assoc($query);
?>

<div class="container mt-5">
    <h2>Detail Produk</h2>
    <table class="table">
        <tr>
            <th>ID</th>
            <td><?= $data['id'] ?></td>
        </tr>
        <tr>
            <th>Nama Produk</th>
            <td><?= $data['nama_produk'] ?></td>
        </tr>
        <tr>
            <th>Harga</th>
            <td><?= number_format($data['harga']) ?></td>
        </tr>
        <tr>
            <th>Stok</th>
            <td><?= $data['stok'] ?></td>
        </tr>
        <tr>
            <th>Jenis Produk</th>
            <td><?= $data['nama_jenis'] ?></td>
        </tr>
    </table>
</div>

<?php include 'partials/footer.php'; ?>

