<?php
require_once __DIR__ . '/../config/Connection.php';

class JenisProduk {
    private $conn;

    public function __construct() {
        $this->conn = Connection::getConnection();
    }

    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM jenis_produk");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM jenis_produk WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data) {
        $stmt = $this->conn->prepare("INSERT INTO jenis_produk (nama_jenis) VALUES (?)");
        return $stmt->execute([$data['nama_jenis']]);
    }

    public function update($id, $data) {
        $stmt = $this->conn->prepare("UPDATE jenis_produk SET nama_jenis = ? WHERE id = ?");
        return $stmt->execute([$data['nama_jenis'], $id]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM jenis_produk WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
