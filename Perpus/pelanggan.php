<?php
require "database.php";
class Pelanggan {
    private $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->getConnection();
    }

    // CREATE
    public function tambahAnggota($nama, $jabatan,$kelas,$telp) {
        $sql = "INSERT INTO anggota (nama, jabatan, kelas, no_telp) VALUES (:nama, :jabatan, :kelas, :no_telp)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":nama", $nama);
        $stmt->bindParam(":jabatan", $jabatan);
        $stmt->bindParam(":kelas", $kelas);
        $stmt->bindParam(":no_telp", $telp);
        return $stmt->execute();
    }

    // READ
    public function tampilAnggota() {
        $sql = "SELECT * FROM anggota";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // UPDATE
    public function ubahAnggota($id, $nama, $jabatan,$kelas,$telp) {
        $sql = "UPDATE anggota SET nama=:nama, jabatan=:jabatan , kelas=:kelas, no_telp=:telp WHERE id_anggota=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":nama", $nama);
        $stmt->bindParam(":jabatan", $jabatan);
        $stmt->bindParam(":kelas", $kelas);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":telp", $telp);
        return $stmt->execute();
    }

    // DELETE
    public function hapusAnggota($id) {
        $sql = "DELETE FROM anggota WHERE id_anggota=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}

