<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../database.php'; // Koneksi menggunakan PDO & dotenv

// Cek jika request adalah POST dan ada ID
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    // Ambil data dari form
    $id = $_POST['id'];
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $jenis_produk_id = $_POST['jenis_produk_id'];
    $deskripsi = $_POST['deskripsi'];

    // Validasi sederhana
    if (empty($kode) || empty($nama) || empty($harga) || empty($stok)) {
        die("Semua field wajib diisi!");
    }

    try {
        // Update data dengan prepared statement
        $stmt = $pdo->prepare("
            UPDATE produk SET 
                kode = :kode,
                nama = :nama,
                harga = :harga,
                stok = :stok,
                jenis_produk_id = :jenis_produk_id,
                deskripsi = :deskripsi
            WHERE id = :id
        ");
        $stmt->execute([
            ':kode' => $kode,
            ':nama' => $nama,
            ':harga' => $harga,
            ':stok' => $stok,
            ':jenis_produk_id' => $jenis_produk_id,
            ':deskripsi' => $deskripsi,
            ':id' => $id
        ]);

        header("Location: produk_list.php?sukses=update");
        exit;
    } catch (PDOException $e) {
        die("Gagal mengupdate produk: " . $e->getMessage());
    }
} else {
    die("Permintaan tidak valid.");
}
?>