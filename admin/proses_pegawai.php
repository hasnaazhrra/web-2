<?php
require_once __DIR__ . '/../database.php'; // Pastikan path sudah benar

try {
    // Proses tambah atau edit data pegawai
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Ambil data dari form
        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $jabatan = $_POST['jabatan'];

        if (!empty($_POST['id'])) {
            // Edit data
            $id = $_POST['id'];
            $stmt = $pdo->prepare("UPDATE pegawai SET nip = ?, nama = ?, jenis_kelamin = ?, jabatan = ? WHERE id = ?");
            $stmt->execute([$nip, $nama, $jenis_kelamin, $jabatan, $id]);

            header("Location: pegawai_list.php?status=sukses_edit");
        } else {
            // Tambah data
            $stmt = $pdo->prepare("INSERT INTO pegawai (nip, nama, jenis_kelamin, jabatan) VALUES (?, ?, ?, ?)");
            $stmt->execute([$nip, $nama, $jenis_kelamin, $jabatan]);

            header("Location: pegawai_list.php?status=sukses_tambah");
        }

        exit;
    }

    // Proses hapus
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $stmt = $pdo->prepare("DELETE FROM pegawai WHERE id = ?");
        $stmt->execute([$id]);

        header("Location: pegawai_list.php?status=sukses_hapus");
        exit;
    }

} catch (PDOException $e) {
    // Redirect ke halaman list dengan error message (disingkat agar aman untuk URL)
    $error = urlencode($e->getMessage());
    header("Location: pegawai_list.php?status=gagal&error=$error");
    exit;
}
?>
