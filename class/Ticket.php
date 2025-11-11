<?php
require_once 'config/db.php';

class Ticket
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->conn;
    }

    public function getAllTickets()
    {
        $sql = "SELECT 
                tiket.id_tiket,
                member.id_member,
                film.id_film,
                member.nama_member,
                film.judul_film,
                tiket.nomor_kursi,
                film.jadwal_tayang,
                tiket.tanggal_menonton,
                tiket.tanggal_pemesanan,
                tiket.harga
            FROM tiket
            JOIN member ON tiket.id_member = member.id_member
            JOIN film ON tiket.id_film = film.id_film
            ORDER BY tiket.id_tiket ASC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTicketById($id)
    {
        $sql = "SELECT 
                tiket.id_tiket,
                member.id_member,
                film.id_film,
                member.nama_member,
                film.judul_film,
                tiket.nomor_kursi,
                film.jadwal_tayang,
                tiket.tanggal_menonton,
                tiket.tanggal_pemesanan,
                tiket.harga
            FROM tiket
            JOIN member ON tiket.id_member = member.id_member
            JOIN film ON tiket.id_film = film.id_film
            WHERE tiket.id_tiket = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addTicket($id_member, $id_film, $nomor_kursi, $tanggal_menonton, $tanggal_pemesanan, $harga)
    {
        $sql = "INSERT INTO tiket (id_member, id_film, nomor_kursi, tanggal_menonton, tanggal_pemesanan, harga)
            VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id_member, $id_film, $nomor_kursi, $tanggal_menonton, $tanggal_pemesanan, $harga]);
    }

    public function updateTicket($id_tiket, $id_member, $id_film, $nomor_kursi, $tanggal_menonton, $tanggal_pemesanan, $harga)
    {
        $sql = "UPDATE tiket
            SET 
                id_member = ?,
                id_film = ?,
                nomor_kursi = ?,
                tanggal_menonton = ?,
                tanggal_pemesanan = ?,
                harga = ?
            WHERE id_tiket = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id_member, $id_film, $nomor_kursi, $tanggal_menonton, $tanggal_pemesanan, $harga, $id_tiket]);
    }

    public function deleteTicket($id)
    {
        $sql = "DELETE FROM tiket WHERE id_tiket = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
}
