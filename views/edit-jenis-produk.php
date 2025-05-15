
<?php
include 'partials/navbar.php';
include 'partials/sidebar.php';
include '../../config/koneksi.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_jenis = $_POST['nama_jenis'];
    $query = mysqli_query($koneksi, "UPDATE jenis_produk SET nama_jenis = '$nama_jenis' WHERE id = $id");

    if ($query) {
        echo "<script>alert('Data berhasil diupdate'); window.location.href='list-jenis-produk.php';</script>";
    } else {
        echo "Gagal mengupdate data";
    }
}

$query = mysqli_query($koneksi, "SELECT * FROM jenis_produk WHERE id = $id");
$data = mysqli_fetch_assoc($query);
?>

<div class="container mt-5">
    <h2>Edit Jenis Produk</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="nama_jenis" class="form-label">Nama Jenis Produk</label>
            <input type="text" class="form-control" name="nama_jenis" value="<?= $data['nama_jenis'] ?>" required>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
    </form>
</div>

<?php include 'partials/footer.php'; ?>
