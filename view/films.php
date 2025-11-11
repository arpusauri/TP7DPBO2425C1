<h3>Film List</h3>
<div class="add-container">
    <a href="index.php?page=add_film" class="btn btn-add">+ Add Film</a>
</div>
<table>
    <tr>
        <th>ID</th>
        <th>Judul Film</th>
        <th>Genre</th>
        <th>Durasi (menit)</th>
        <th>Jadwal</th>
        <th>Tanggal Rilis</th>
        <th colspan="2">Aksi</th>
    </tr>
    <?php foreach ($film->getAllFilms() as $f): ?>
        <tr>
            <td><?= $f['id_film'] ?></td>
            <td><?= $f['judul_film'] ?></td>
            <td><?= $f['genre'] ?></td>
            <td><?= $f['durasi'] ?></td>
            <td><?= $f['jadwal_tayang'] ?></td>
            <td><?= $f['tanggal_rilis'] ?></td>
            <td class="actions">
                <a href="index.php?page=update_film&id_film=<?= $f['id_film'] ?>" class="btn btn-update">Update</a>
            </td>
            <td>
                <a href="index.php?page=delete_film&id_film=<?= $f['id_film'] ?>" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus film ini?');">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>