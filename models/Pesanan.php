<?php
require_once __DIR__ . '/../config/Connection.php';

class Pesanan {
    private $conn;

    public function __construct() {
        $this->conn = Connection::getConnection();
    }

    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM pesanan");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM pesanan WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data) {
        $stmt = $this->conn->prepare("INSERT INTO pesanan (anggota_id, produk_id, jumlah, tanggal) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$data['anggota_id'], $data['produk_id'], $data['jumlah'], $data['tanggal']]);
    }

    public function update($id, $data) {
        $stmt = $this->conn->prepare("UPDATE pesanan SET anggota_id = ?, produk_id = ?, jumlah = ?, tanggal = ? WHERE id = ?");
        return $stmt->execute([$data['anggota_id'], $data['produk_id'], $data['jumlah'], $data['tanggal'], $id]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM pesanan WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
