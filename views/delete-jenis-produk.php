<?php
include '../../config/koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM jenis_produk WHERE id = $id");

if ($query) {
    echo "<script>alert('Data berhasil dihapus'); window.location.href='list-jenis-produk.php';</script>";
} else {
    echo "Gagal menghapus data";
}
?>

