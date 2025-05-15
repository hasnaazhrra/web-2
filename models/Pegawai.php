<?php
require_once __DIR__ . '/../config/Connection.php';

class Pegawai {
    private $conn;

    public function __construct() {
        $this->conn = Connection::getConnection();
    }

    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM pegawai");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM pegawai WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data) {
        $stmt = $this->conn->prepare("INSERT INTO pegawai (nama, jabatan) VALUES (?, ?)");
        return $stmt->execute([$data['nama'], $data['jabatan']]);
    }

    public function update($id, $data) {
        $stmt = $this->conn->prepare("UPDATE pegawai SET nama = ?, jabatan = ? WHERE id = ?");
        return $stmt->execute([$data['nama'], $data['jabatan'], $id]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM pegawai WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
