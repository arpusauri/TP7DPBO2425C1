<?php
require_once 'class/Ticket.php';
require_once 'class/Member.php';
require_once 'class/Film.php';

$ticket = new Ticket();
$member = new Member();
$film = new Film();

$id = $_GET['id_tiket'];
$data = $ticket->getTicketById($id);

$members = $member->getAllMembers();
$films = $film->getAllFilms();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ticket->updateTicket(
        $id,
        $_POST['id_member'],
        $_POST['id_film'],
        $_POST['nomor_kursi'],
        $_POST['tanggal_menonton'],
        $_POST['tanggal_pemesanan'],
        $_POST['harga']
    );

    header("Location: index.php?page=tickets");
    exit;
}
?>

<h3>Update Ticket</h3>
<form method="POST" class="form-container">

    <label>Member:</label>
    <select name="id_member" required>
        <?php foreach ($members as $m): ?>
            <option value="<?= $m['id_member'] ?>" <?= $m['id_member'] == $data['id_member'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($m['nama_member']) ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <label>Film:</label>
    <select name="id_film" required>
        <?php foreach ($films as $f): ?>
            <option value="<?= $f['id_film'] ?>" <?= $f['id_film'] == $data['id_film'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($f['judul_film']) ?> (<?= htmlspecialchars($f['jadwal_tayang']) ?>)
            </option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <label>Nomor Kursi:</label>
    <input type="text" name="nomor_kursi" value="<?= htmlspecialchars($data['nomor_kursi']) ?>" required><br><br>

    <label>Tanggal Menonton:</label>
    <input type="date" name="tanggal_menonton" value="<?= htmlspecialchars($data['tanggal_menonton']) ?>" required><br><br>

    <label>Tanggal Pemesanan:</label>
    <input type="date" name="tanggal_pemesanan" value="<?= htmlspecialchars($data['tanggal_pemesanan']) ?>" required><br><br>

    <label>Harga:</label>
    <input type="number" name="harga" value="<?= htmlspecialchars($data['harga']) ?>" step="0.01" required><br><br>

    <button type="submit">Update</button>
</form>