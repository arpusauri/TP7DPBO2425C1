<?php
require_once 'class/Film.php';
$film = new Film();

$id = $_GET['id_film'];
$data = $film->getFilmById($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $film->updateFilm(
        $id,
        $_POST['judul_film'],
        $_POST['genre'],
        $_POST['durasi'],
        $_POST['jadwal_tayang'],
        $_POST['tanggal_rilis'],
    );

    header("Location: index.php?page=films");
    exit;
}
?>

<h3>Update Film</h3>
<form method="POST" class="form-container">
    <label>Judul Film:</label>
    <input type="text" name="judul_film" value="<?= htmlspecialchars($data['judul_film']) ?>" required><br><br>

    <label>Genre:</label>
    <input type="text" name="genre" value="<?= htmlspecialchars($data['genre']) ?>" required><br><br>

    <label>Durasi (menit):</label>
    <input type="number" name="durasi" value="<?= htmlspecialchars($data['durasi']) ?>" required><br><br>

    <label>Jadwal Tayang:</label>
    <input type="time" name="jadwal_tayang" value="<?= htmlspecialchars($data['jadwal_tayang']) ?>" required><br><br>

    <label>Tanggal Rilis:</label>
    <input type="date" name="tanggal_rilis" value="<?= htmlspecialchars($data['tanggal_rilis']) ?>" required><br><br>

    <button type="submit">Update</button>
</form>