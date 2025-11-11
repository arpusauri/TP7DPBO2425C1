<?php
require_once 'class/Film.php';
$film = new Film();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul_film'];
    $genre = $_POST['genre'];
    $durasi = $_POST['durasi'];
    $jadwal_tayang = $_POST['jadwal_tayang'];
    $tanggal_rilis = $_POST['tanggal_rilis'];

    $film->addFilm($judul, $genre, $durasi, $jadwal_tayang, $tanggal_rilis);
    header("Location: index.php?page=films");
    exit;
}
?>

<h3>Add Film</h3>
<form method="POST" class="form-container">
    <label>Judul Film:</label>
    <input type="text" name="judul_film" required><br><br>

    <label>Genre:</label>
    <input type="text" name="genre" required><br><br>

    <label>Durasi (menit):</label>
    <input type="number" name="durasi" required><br><br>

    <label>Jadwal Tayang:</label>
    <input type="time" name="jadwal_tayang" required><br><br>

    <label>Tanggal Rilis:</label>
    <input type="date" name="tanggal_rilis" required><br><br>

    <button type="submit">Simpan</button>
</form>