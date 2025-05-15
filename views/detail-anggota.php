<?php
include 'partials/navbar.php';
include 'partials/sidebar.php';
include '../../config/koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id = $id");
$data = mysqli_fetch_assoc($query);
?>

<div class="container mt-5">
    <h2>Detail Anggota</h2>
    <table class="table">
        <tr>
            <th>Nama</th>
            <td><?= $data['nama'] ?></td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td><?= $data['alamat'] ?></td>
        </tr>
        <tr>
            <th>No Telepon</th>
            <td><?= $data['no_telp'] ?></td>
        </tr>
    </table>
</div>

<?php include 'partials/footer.php'; ?>
