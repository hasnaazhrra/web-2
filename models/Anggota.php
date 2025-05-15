<?php
require_once __DIR__ . '/../config/Connection.php';

class Anggota {
    private $conn;

    public function __construct() {
        $this->conn = Connection::getConnection();
    }

    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM anggota");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM anggota WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data) {
        $stmt = $this->conn->prepare("INSERT INTO anggota (nama, alamat, no_telp) VALUES (?, ?, ?)");
        return $stmt->execute([$data['nama'], $data['alamat'], $data['no_telp']]);
    }

    public function update($id, $data) {
        $stmt = $this->conn->prepare("UPDATE anggota SET nama = ?, alamat = ?, no_telp = ? WHERE id = ?");
        return $stmt->execute([$data['nama'], $data['alamat'], $data['no_telp'], $id]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM anggota WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
