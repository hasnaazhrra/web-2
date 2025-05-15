<?php
include '../../config/koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM pegawai WHERE id = $id");

if ($query) {
    echo "<script>alert('Pegawai berhasil dihapus'); window.location.href='list-pegawai.php';</script>";
} else {
    echo "Gagal menghapus data";
}
?>

