
<?php
include '../../config/koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM kartu_diskon WHERE id = $id");

if ($query) {
    echo "<script>alert('Kartu diskon berhasil dihapus'); window.location.href='list-kartu-diskon.php';</script>";
} else {
    echo "Gagal menghapus data";
}
?>
