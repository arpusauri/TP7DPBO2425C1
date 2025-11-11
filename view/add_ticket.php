<?php
require_once 'class/Ticket.php';
require_once 'class/Member.php';
require_once 'class/Film.php';

$ticket = new Ticket();
$member = new Member();
$film = new Film();

$members = $member->getAllMembers();
$films = $film->getAllFilms();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (
        !empty($_POST['id_member']) && !empty($_POST['id_film']) && !empty($_POST['nomor_kursi']) &&
        !empty($_POST['tanggal_menonton']) && !empty($_POST['tanggal_pemesanan']) && !empty($_POST['harga'])
    ) {
        $ticket->addTicket(
            $_POST['id_member'],
            $_POST['id_film'],
            $_POST['nomor_kursi'],
            $_POST['tanggal_menonton'],
            $_POST['tanggal_pemesanan'],
            $_POST['harga']
        );

        header("Location: index.php?page=tickets");
        exit;
    } else {
        echo "<p style='color:red;'>Semua field harus diisi!</p>";
    }
}
?>

<h3>Add Ticket</h3>
<form method="POST" class="form-container">

    <label>Member:</label>
    <select name="id_member" required>
        <option value="">-- Pilih Member --</option>
        <?php foreach ($members as $m): ?>
            <option value="<?= $m['id_member'] ?>">
                <?= htmlspecialchars($m['nama_member']) ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <label>Film:</label>
    <select name="id_film" required>
        <option value="">-- Pilih Film --</option>
        <?php foreach ($films as $f): ?>
            <option value="<?= $f['id_film'] ?>">
                <?= htmlspecialchars($f['judul_film']) ?> (<?= htmlspecialchars($f['jadwal_tayang']) ?>)
            </option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <label>Nomor Kursi:</label>
    <input type="text" name="nomor_kursi" required><br><br>

    <label>Tanggal Menonton:</label>
    <input type="date" name="tanggal_menonton" required><br><br>

    <label>Tanggal Pemesanan:</label>
    <input type="date" name="tanggal_pemesanan" required><br><br>

    <label>Harga:</label>
    <input type="number" name="harga" step="0.01" required><br><br>

    <button type="submit">Simpan</button>
</form>