<?php
include '../../config/koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM pesanan WHERE id = $id");

if ($query) {
    echo "<script>alert('Pesanan berhasil dihapus'); window.location.href='list-pesanan.php';</script>";
} else {
    echo "Gagal menghapus data";
}
?>

