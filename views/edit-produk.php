<?php
include 'partials/navbar.php';
include 'partials/sidebar.php';
include '../../config/koneksi.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $id_jenis = $_POST['id_jenis_produk'];

    $query = mysqli_query($koneksi, "UPDATE produk SET 
        nama_produk='$nama_produk', 
        harga='$harga', 
        stok='$stok',
        id_jenis_produk='$id_jenis' 
        WHERE id=$id");

    if ($query) {
        echo "<script>alert('Produk berhasil diupdate'); window.location.href='list-produk.php';</script>";
    } else {
        echo "Gagal mengupdate data";
    }
}

$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM produk WHERE id=$id"));
$jenis = mysqli_query($koneksi, "SELECT * FROM jenis_produk");
?>

<div class="container mt-5">
    <h2>Edit Produk</h2>
    <form method="POST">
        <div class="mb-3">

