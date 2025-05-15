<?php
require_once __DIR__ . '/../database.php'; // Pastikan path ke database.php benar

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Tambah anggota
        if (!isset($_POST['id'])) {
            $pegawai_id = $_POST['pegawai_id'];
            $kartu_diskon_id = !empty($_POST['kartu_diskon_id']) ? $_POST['kartu_diskon_id'] : null;
            $status_aktif = $_POST['status_aktif'];

            // Validasi
            if (empty($pegawai_id) || !in_array($status_aktif, ['aktif', 'non_aktif'])) {
                die("Data tidak valid!");
            }

            $stmt = $pdo->prepare("INSERT INTO anggota (pegawai_id, kartu_diskon_id, status_aktif) VALUES (?, ?, ?)");
            $stmt->execute([$pegawai_id, $kartu_diskon_id, $status_aktif]);

            header("Location: anggota_list.php?sukses=tambah");
            exit;
        }

        // Edit anggota
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $kartu_diskon_id = !empty($_POST['kartu_diskon_id']) ? $_POST['kartu_diskon_id'] : null;
            $status_aktif = $_POST['status_aktif'];

            if (!in_array($status_aktif, ['aktif', 'non_aktif'])) {
                die("Status tidak valid!");
            }

            $stmt = $pdo->prepare("UPDATE anggota SET kartu_diskon_id = ?, status_aktif = ? WHERE id = ?");
            $stmt->execute([$kartu_diskon_id, $status_aktif, $id]);

            header("Location: anggota_list.php?sukses=update");
            exit;
        }
    }

    // Hapus anggota
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $stmt = $pdo->prepare("DELETE FROM anggota WHERE id = ?");
        $stmt->execute([$id]);

        header("Location: anggota_list.php?hapus=sukses");
        exit;
    }

    // Redirect default jika tidak memenuhi syarat
    header("Location: anggota_list.php");
    exit;

} catch (PDOException $e) {
    die("Terjadi kesalahan: " . $e->getMessage());
}
