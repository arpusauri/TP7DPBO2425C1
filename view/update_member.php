<?php
require_once 'class/Member.php';
$member = new Member();

$id = $_GET['id_member'];
$data = $member->getMemberById($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $member->updateMember($id, $_POST['nama_member'], $_POST['email'], $_POST['no_hp'], $_POST['tanggal_daftar']);
    header("Location: index.php?page=members");
    exit;
}
?>

<h3>Update Member</h3>
<form method="POST" class="form-container">
    <label>Nama Member:</label>
    <input type="text" name="nama_member" value="<?= $data['nama_member'] ?>" required><br><br>

    <label>Email:</label>
    <input type="email" name="email" value="<?= $data['email'] ?>" required><br><br>

    <label>No HP:</label>
    <input type="text" name="no_hp" value="<?= $data['no_hp'] ?>" required><br><br>

    <label>Tanggal Daftar:</label>
    <input type="date" name="tanggal_daftar" value="<?= $data['tanggal_daftar'] ?>" required><br><br>

    <button type="submit">Update</button>
</form>