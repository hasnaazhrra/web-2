<?php
include 'partials/navbar.php';
include 'partials/sidebar.php';
include '../../config/koneksi.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_anggota = $_POST['id_anggota'];
    $id_produk = $_POST['id_produk'];
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];

    $query = mysqli_query($koneksi, "UPDATE pesanan SET 
        id_anggota = '$id_anggota', 
        id_produk = '$id_produk', 
        jumlah = '$jumlah', 
        tanggal = '$tanggal'
        WHERE id = $id");

    if ($query) {
        echo "<script>alert('Pesanan berhasil diupdate'); window.location.href='list-pesanan.php';</script>";
    } else {
        echo "Gagal mengupdate data";
    }
}

$pesanan = mysqli_query($koneksi, "SELECT * FROM pesanan WHERE id = $id");
$data = mysqli_fetch_assoc($pesanan);

$anggota = mysqli_query($koneksi, "SELECT id, nama FROM anggota");
$produk = mysqli_query($koneksi, "SELECT id, nama_produk FROM produk");
?>

<div class="container mt-5">
    <h2>Edit Pesanan</h2>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Anggota</label>
            <select class="form-control" name="id_anggota" required>
                <?php while($a = mysqli_fetch_assoc($anggota)) : ?>
                    <option value="<?= $a['id'] ?>" <?= $a['id'] == $data['id_anggota'] ? 'selected' : '' ?>>
                        <?= $a['nama'] ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Produk</label>
            <select class="form-control" name="id_produk" required>
                <?php while($p = mysqli_fetch_assoc($produk)) : ?>
                    <option value="<?= $p['id'] ?>" <?= $p['id'] == $data['id_produk'] ? 'selected' : '' ?>>
                        <?= $p['nama_produk'] ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Jumlah</label>
            <input type="number" class="form-control" name="jumlah" value="<?= $data['jumlah'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" class="form-control" name="tanggal" value="<?= $data['tanggal'] ?>" required>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
    </form>
</div>

<?php include 'partials/footer.php'; ?>

