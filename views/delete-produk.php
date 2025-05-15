<?php
include '../../config/koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM produk WHERE id = $id");

if ($query) {
    echo "<script>alert('Produk berhasil dihapus'); window.location.href='list-produk.php';</script>";
} else {
    echo "Gagal menghapus data";
}
?>

