<?php
include 'partials/navbar.php';
include 'partials/sidebar.php';
include '../../config/koneksi.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_kartu = $_POST['nama_kartu'];
    $diskon = $_POST['diskon'];

    $query = mysqli_query($koneksi, "UPDATE kartu_diskon SET nama_kartu = '$nama_kartu', diskon = '$diskon' WHERE id = $id");

    if ($query) {
        echo "<script>alert('Kartu diskon berhasil diupdate'); window.location.href='list-kartu-diskon.php';</script>";
    } else {
        echo "Gagal mengupdate data";
    }
}

$query = mysqli_query($koneksi, "SELECT * FROM kartu_diskon WHERE id = $id");
$data = mysqli_fetch_assoc($query);
?>

<div class="container mt-5">
    <h2>Edit Kartu Diskon</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="nama_kartu" class="form-label">Nama Kartu</label>
            <input type="text" class="form-control" name="nama_kartu" value="<?= $data['nama_kartu'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="diskon" class="form-label">Diskon (%)</label>
            <input type="number" class="form-control" name="diskon" value="<?= $data['diskon'] ?>" required>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
    </form>
</div>

<?php include 'partials/footer.php'; ?>

