<h3>Ticket List</h3>
<div class="add-container">
    <a href="index.php?page=add_ticket" class="btn btn-add">+ Add Ticket</a>
</div>

<table>
    <tr>
        <th>ID Tiket</th>
        <th>Member</th>
        <th>Film</th>
        <th>Nomor Kursi</th>
        <th>Jadwal Tayang</th>
        <th>Tanggal Menonton</th>
        <th>Tanggal Pemesanan</th>
        <th>Harga</th>
        <th colspan="2">Aksi</th>
    </tr>
    <?php foreach ($ticket->getAllTickets() as $t): ?>
        <tr>
            <td><?= $t['id_tiket'] ?></td>
            <td><?= $t['nama_member'] ?></td>
            <td><?= $t['judul_film'] ?></td>
            <td><?= $t['nomor_kursi'] ?></td>
            <td><?= $t['jadwal_tayang'] ?></td>
            <td><?= $t['tanggal_menonton'] ?></td>
            <td><?= $t['tanggal_pemesanan'] ?></td>
            <td><?= $t['harga'] ?></td>
            <td class="actions">
                <a href="index.php?page=update_ticket&id_tiket=<?= $t['id_tiket'] ?>" class="btn btn-update">Update</a>
            </td>
            <td>
                <a href="index.php?page=delete_ticket&id_tiket=<?= $t['id_tiket'] ?>" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus tiket ini?');">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>