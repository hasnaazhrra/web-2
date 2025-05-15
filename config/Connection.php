<?php
class Connection {
    private static $host = 'localhost';
    private static $db   = 'dbkoperasi';
    private static $user = 'root';
    private static $pass = '';
    private static $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    public static function getConnection() {
        try {
            return new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db, self::$user, self::$pass, self::$options);
        } catch (PDOException $e) {
            die("Koneksi gagal: " . $e->getMessage());
        }
    }
}
?>
