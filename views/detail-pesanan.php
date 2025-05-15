<?php
include 'partials/navbar.php';
include 'partials/sidebar.php';
include '../../config/koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($koneksi, "
    SELECT p.*, a.nama AS nama_anggota, pr.nama_produk 
    FROM pesanan p 
    JOIN anggota a ON p.id_anggota = a.id 
    JOIN produk pr ON p.id_produk = pr.id 
    WHERE p.id = $id
");
$data = mysqli_fetch_assoc($query);
?>

<div class="container mt-5">
    <h2>Detail Pesanan</h2>
    <table class="table">
        <tr>
            <th>ID</th>
            <td><?= $data['id'] ?></td>
        </tr>
        <tr>
            <th>Nama Anggota</th>
            <td><?= $data['nama_anggota'] ?></td>
        </tr>
        <tr>
            <th>Produk</th>
            <td><?= $data['nama_produk'] ?></td>
        </tr>
        <tr>
            <th>Jumlah</th>
            <td><?= $data['jumlah'] ?></td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td><?= $data['tanggal'] ?></td>
        </tr>
    </table>
</div>

<?php include 'partials/footer.php'; ?>

