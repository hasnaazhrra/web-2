<?php
include 'partials/navbar.php';
include 'partials/sidebar.php';
include '../../config/koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id = $id");
$data = mysqli_fetch_assoc($query);
?>

<div class="container mt-5">
    <h2>Detail Pegawai</h2>
    <table class="table">
        <tr>
            <th>ID</th>
            <td><?= $data['id'] ?></td>
        </tr>
        <tr>
            <th>Nama</th>
            <td><?= $data['nama'] ?></td>
        </tr>
        <tr>
            <th>NIP</th>
            <td><?= $data['nip'] ?></td>
        </tr>
        <tr>
            <th>Jabatan</th>
            <td><?= $data['jabatan'] ?></td>
        </tr>
    </table>
</div>

<?php include 'partials/footer.php'; ?>

