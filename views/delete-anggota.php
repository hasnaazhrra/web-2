<?php
include '../../config/koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM anggota WHERE id = $id");

if ($query) {
    header("Location: ../../views/anggota/index.php?pesan=hapus");
} else {
    echo "Gagal menghapus data";
}
?>
