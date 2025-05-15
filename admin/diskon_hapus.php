<?php
require_once 'koneksi.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

   
    $cek = mysqli_query($koneksi, "SELECT * FROM kartu_diskon WHERE id = $id");
    if (mysqli_num_rows($cek) > 0) {
        $hapus = mysqli_query($koneksi, "DELETE FROM kartu_diskon WHERE id = $id");

        if ($hapus) {
            header('Location: diskon_list.php?status=hapus');
            exit;
        } else {
            header('Location: diskon_list.php?status=gagal&error=' . urlencode(mysqli_error($koneksi)));
            exit;
        }
    } else {
        
        header('Location: diskon_list.php?status=gagal&error=Diskon tidak ditemukan');
        exit;
    }
} else {
    header('Location: diskon_list.php?status=gagal&error=ID tidak ditemukan');
    exit;
}
?>
