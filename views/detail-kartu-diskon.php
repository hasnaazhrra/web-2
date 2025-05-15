<?php
include 'partials/navbar.php';
include 'partials/sidebar.php';
include '../../config/koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM kartu_diskon WHERE id = $id");
$data = mysqli_fetch_assoc($query);
?>

<div class="container mt-5">
    <h2>Detail Kartu Diskon</h2>
    <table class="table">
        <tr>
            <th>ID</th>
            <td><?= $data['id'] ?></td>
        </tr>
        <tr>
            <th>Nama Kartu</th>
            <td><?= $data['nama_kartu'] ?></td>
        </tr>
        <tr>
            <th>Diskon</th>
            <td><?= $data['diskon'] ?>%</td>
        </tr>
    </table>
</div>

<?php include 'partials/footer.php'; ?>

