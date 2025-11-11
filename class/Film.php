<?php
require_once 'config/db.php';

class Film
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->conn;
    }

    public function getAllFilms()
    {
        $sql = "SELECT * FROM film ORDER BY id_film ASC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFilmById($id)
    {
        $sql = "SELECT * FROM film WHERE id_film = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addFilm($judul, $genre, $durasi, $jadwal_tayang, $tanggal_rilis)
    {
        $sql = "INSERT INTO film (judul_film, genre, durasi, jadwal_tayang, tanggal_rilis)
            VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$judul, $genre, $durasi, $jadwal_tayang, $tanggal_rilis]);
    }

    public function updateFilm($id, $judul, $genre, $durasi, $jadwal_tayang, $tanggal_rilis)
    {
        $sql = "UPDATE film SET judul_film=?, genre=?, durasi=?, jadwal_tayang=?, tanggal_rilis=? WHERE id_film=?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$judul, $genre, $durasi, $jadwal_tayang, $tanggal_rilis, $id]);
    }

    public function deleteFilm($id)
    {
        $sql = "DELETE FROM film WHERE id_film = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
}
