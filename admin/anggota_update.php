<?php
require_once __DIR__ . '/../database.php'; // Pastikan path ke database.php benar

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $kartu_diskon_id = !empty($_POST['kartu_diskon_id']) ? $_POST['kartu_diskon_id'] : NULL;
    $status_aktif = $_POST['status_aktif']; // 'aktif' atau 'non_aktif'
    
    // Validasi data
    if (!in_array($status_aktif, ['aktif', 'non_aktif'])) {
        die("Status tidak valid!");
    }

    // Query untuk update data anggota
    $query = "UPDATE anggota SET 
              kartu_diskon_id = :kartu_diskon_id,
              status_aktif = :status_aktif
              WHERE id = :id";

    // Menyiapkan statement
    $stmt = $pdo->prepare($query);
    
    // Mengikat parameter
    $stmt->bindParam(':kartu_diskon_id', $kartu_diskon_id, PDO::PARAM_INT);
    $stmt->bindParam(':status_aktif', $status_aktif, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
    // Menjalankan query
    if ($stmt->execute()) {
        // Redirect jika update sukses
        header("Location: anggota_list.php?sukses=update");
        exit(); // Pastikan script berhenti setelah redirect
    } else {
        die("Gagal mengupdate: " . $stmt->errorInfo()[2]);
    }
}
?>
