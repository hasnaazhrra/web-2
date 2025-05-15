<?php
require_once __DIR__ . '/../database.php'; // Pastikan path ke database.php benar

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['tambah'])) {
        // Proses tambah data
        $nama = $_POST['nama'];
        $deskripsi = $_POST['deskripsi'];
        
        // Menggunakan prepared statement untuk menghindari SQL Injection
        $query = "INSERT INTO jenis_produk (nama, deskripsi) VALUES (:nama, :deskripsi)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':nama', $nama, PDO::PARAM_STR);
        $stmt->bindParam(':deskripsi', $deskripsi, PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            header('Location: jenis_produk_list.php?status=sukses_tambah');
        } else {
            header('Location: jenis_produk_list.php?status=gagal&error=' . implode(', ', $stmt->errorInfo()));
        }
    } elseif (isset($_POST['edit'])) {
        // Proses edit data
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $deskripsi = $_POST['deskripsi'];
        
        // Menggunakan prepared statement untuk menghindari SQL Injection
        $query = "UPDATE jenis_produk SET nama = :nama, deskripsi = :deskripsi WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':nama', $nama, PDO::PARAM_STR);
        $stmt->bindParam(':deskripsi', $deskripsi, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            header('Location: jenis_produk_list.php?status=sukses_edit');
        } else {
            header('Location: jenis_produk_list.php?status=gagal&error=' . implode(', ', $stmt->errorInfo()));
        }
    }
}
?>
