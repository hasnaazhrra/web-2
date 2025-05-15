<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../database.php';


use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Fungsi redirect
function redirect($lokasi) {
    header("Location: $lokasi");
    exit;
}

// Tambah Produk
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['id'])) {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $jenis_produk_id = $_POST['jenis_produk_id'];
    $deskripsi = $_POST['deskripsi'];

    try {
        $stmt = $pdo->prepare("INSERT INTO produk (kode, nama, harga, stok, jenis_produk_id, deskripsi)
                               VALUES (:kode, :nama, :harga, :stok, :jenis_produk_id, :deskripsi)");
        $stmt->execute([
            ':kode' => $kode,
            ':nama' => $nama,
            ':harga' => $harga,
            ':stok' => $stok,
            ':jenis_produk_id' => $jenis_produk_id,
            ':deskripsi' => $deskripsi,
        ]);

        redirect("produk_list.php?sukses=tambah");
    } catch (PDOException $e) {
        die("Gagal menambahkan produk: " . $e->getMessage());
    }
}

// Edit Produk
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $jenis_produk_id = $_POST['jenis_produk_id'];
    $deskripsi = $_POST['deskripsi'];

    try {
        $stmt = $pdo->prepare("UPDATE produk SET kode = :kode, nama = :nama, harga = :harga, 
                               stok = :stok, jenis_produk_id = :jenis_produk_id, deskripsi = :deskripsi 
                               WHERE id = :id");
        $stmt->execute([
            ':kode' => $kode,
            ':nama' => $nama,
            ':harga' => $harga,
            ':stok' => $stok,
            ':jenis_produk_id' => $jenis_produk_id,
            ':deskripsi' => $deskripsi,
            ':id' => $id,
        ]);

        redirect("produk_list.php?sukses=update");
    } catch (PDOException $e) {
        die("Gagal mengedit produk: " . $e->getMessage());
    }
}

// Hapus produk
if (isset($_GET['hapus_id'])) {
    $id = $_GET['hapus_id'];

    try {
        $stmt = $pdo->prepare("DELETE FROM produk WHERE id = ?");
        $stmt->execute([$id]);

        header("Location: produk_list.php?sukses=hapus");
        exit;
    } catch (PDOException $e) {
        echo "Gagal menghapus: " . $e->getMessage();
    }
}
?>