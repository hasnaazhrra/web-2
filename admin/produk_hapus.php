<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../database.php';

// Cek apakah ID produk ada dalam URL
if (isset($_GET['hapus_id'])) {
    $id = $_GET['hapus_id'];  // Ambil ID dari parameter URL

    // Query untuk menghapus produk berdasarkan ID
    $query = "DELETE FROM produk WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // ✅ Redirect dengan parameter sukses
        header('Location: produk_list.php?sukses=hapus');
        exit;
    } else {
        echo "Terjadi kesalahan saat menghapus produk.";
    }
} else {
    header('Location: produk_list.php');
    exit;
}
