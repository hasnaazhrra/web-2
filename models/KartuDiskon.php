<?php
require_once __DIR__ . '/../config/Connection.php';

class KartuDiskon {
    private $conn;

    public function __construct() {
        $this->conn = Connection::getConnection();
    }

    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM kartu_diskon");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM kartu_diskon WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data) {
        $stmt = $this->conn->prepare("INSERT INTO kartu_diskon (anggota_id, persen_diskon) VALUES (?, ?)");
        return $stmt->execute([$data['anggota_id'], $data['persen_diskon']]);
    }

    public function update($id, $data) {
        $stmt = $this->conn->prepare("UPDATE kartu_diskon SET anggota_id = ?, persen_diskon = ? WHERE id = ?");
        return $stmt->execute([$data['anggota_id'], $data['persen_diskon'], $id]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM kartu_diskon WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
