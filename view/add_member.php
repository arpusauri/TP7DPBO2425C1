<?php
require_once 'class/Member.php';
$member = new Member();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama_member'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $tanggal_daftar = $_POST['tanggal_daftar'];

    $member->addMember($nama, $email, $no_hp, $tanggal_daftar);
    header("Location: index.php?page=members");
    exit;
}
?>

<h3>Add Member</h3>
<form method="POST" class="form-container">
    <label>Nama Member:</label>
    <input type="text" name="nama_member" required><br><br>

    <label>Email:</label>
    <input type="email" name="email" required><br><br>

    <label>No HP:</label>
    <input type="text" name="no_hp" required><br><br>

    <label>Tanggal Daftar:</label>
    <input type="date" name="tanggal_daftar" required><br><br>

    <button type="submit">Simpan</button>
</form>