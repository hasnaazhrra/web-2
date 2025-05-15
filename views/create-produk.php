<?php
include 'partials/navbar.php';
include 'partials/sidebar.php';
include '../../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $id_jenis = $_POST['id_jenis_produk'];

    $query = mysqli_query($koneksi, "INSERT INTO produk (nama_produk, harga, stok, id_jenis_produk) 
                                     VALUES ('$nama_produk', '$harga', '$stok', '$id_jenis')");

    if ($query) {
        echo "<script>alert('Produk berhasil ditambahkan'); window.location.href='list-produk.php';</script>";
    } else {
        echo "Gagal menambahkan data";
    }
}

$jenis = mysqli_query($koneksi, "SELECT * FROM jenis_produk");
?>

<div class="container mt-5">
    <h2>Tambah Produk</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jenis Produk</label>
            <select name="id_jenis_produk" class="form-control" required>
                <option value="">Pilih Jenis Produk</option>
                <?php while ($j = mysqli_fetch_assoc($jenis)) : ?>
                    <option value="<?= $j['id'] ?>"><?= $j['nama_jenis'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<?php include 'partials/footer.php'; ?>
