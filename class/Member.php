<?php
require_once 'config/db.php';

class Member
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->conn;
    }

    public function getAllMembers()
    {
        $sql = "SELECT * FROM member ORDER BY id_member ASC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMemberById($id)
    {
        $sql = "SELECT * FROM member WHERE id_member = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addMember($nama, $email, $no_hp, $tanggal_daftar)
    {
        $sql = "INSERT INTO member (nama_member, email, no_hp, tanggal_daftar)
                VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$nama, $email, $no_hp, $tanggal_daftar]);
    }

    public function updateMember($id, $nama, $email, $no_hp, $tanggal_daftar)
    {
        $sql = "UPDATE member SET nama_member=?, email=?, no_hp=?, tanggal_daftar=? WHERE id_member=?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$nama, $email, $no_hp, $tanggal_daftar, $id]);
    }

    public function deleteMember($id)
    {
        $sql = "DELETE FROM member WHERE id_member = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
}
