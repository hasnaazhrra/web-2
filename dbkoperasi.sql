-- Buat database
CREATE DATABASE IF NOT EXISTS dbkoperasi;
USE dbkoperasi;

-- Tabel pegawai
CREATE TABLE pegawai (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nip VARCHAR(10),
    nama VARCHAR(45),
    jenis_kelamin CHAR(1),
    jabatan VARCHAR(45)
);

-- Tabel kartu_diskon
CREATE TABLE kartu_diskon (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(45),
    deskripsi TEXT,
    persen_diskon INT
);

-- Tabel anggota
CREATE TABLE anggota (
    id INT PRIMARY KEY AUTO_INCREMENT,
    status_aktif BOOLEAN,
    pegawai_id INT UNIQUE,
    kartu_diskon_id INT,
    FOREIGN KEY (pegawai_id) REFERENCES pegawai(id),
    FOREIGN KEY (kartu_diskon_id) REFERENCES kartu_diskon(id)
);

-- Tabel jenis_produk
CREATE TABLE jenis_produk (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(45),
    deskripsi TEXT
);

-- Tabel produk
CREATE TABLE produk (
    id INT PRIMARY KEY AUTO_INCREMENT,
    kode VARCHAR(45),
    nama VARCHAR(45),
    deskripsi TEXT,
    harga DOUBLE,
    stok INT,
    jenis_produk_id INT,
    FOREIGN KEY (jenis_produk_id) REFERENCES jenis_produk(id)
);

-- Tabel pesanan
CREATE TABLE pesanan (
    id INT PRIMARY KEY AUTO_INCREMENT,
    tanggal DATE,
    diskon INT,
    status_bayar BOOLEAN,
    anggota_id INT,
    FOREIGN KEY (anggota_id) REFERENCES anggota(id)
);

-- Tabel detail_pesanan
CREATE TABLE detail_pesanan (
    pesanan_id INT,
    produk_id INT,
    jumlah INT,
    PRIMARY KEY (pesanan_id, produk_id),
    FOREIGN KEY (pesanan_id) REFERENCES pesanan(id),
    FOREIGN KEY (produk_id) REFERENCES produk(id)
);

-- Tabel pembayaran
CREATE TABLE pembayaran (
    id INT PRIMARY KEY AUTO_INCREMENT,
    jumlah_bayar DOUBLE,
    tanggal DATE,
    pesanan_id INT UNIQUE,
    FOREIGN KEY (pesanan_id) REFERENCES pesanan(id)
);
