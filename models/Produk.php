<?php
require_once __DIR__ . '/../config/Connection.php';

class Produk {
    private $conn;

    public function __construct() {
        $this->conn = Connection::getConnection();
    }

    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM produk");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM produk WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->conn->prepare("INSERT INTO produk (nama, harga, stok, jenis_produk_id) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$data['nama'], $data['harga'], $data['stok'], $data['jenis_produk_id']]);
    }

    public function update($id, $data) {
        $stmt = $this->conn->prepare("UPDATE produk SET nama = ?, harga = ?, stok = ?, jenis_produk_id = ? WHERE id = ?");
        return $stmt->execute([$data['nama'], $data['harga'], $data['stok'], $data['jenis_produk_id'], $id]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM produk WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
