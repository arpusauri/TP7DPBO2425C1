<h3>Member List</h3>
<div class="add-container">
    <a href="index.php?page=add_member" class="btn btn-add">+ Add Member</a>
</div>

<table>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>No Telepon</th>
        <th>Tanggal Daftar</th>
        <th colspan="2">Aksi</th>
    </tr>
    <?php foreach ($member->getAllMembers() as $m): ?>
        <tr>
            <td><?= $m['id_member'] ?></td>
            <td><?= $m['nama_member'] ?></td>
            <td><?= $m['email'] ?></td>
            <td><?= $m['no_hp'] ?></td>
            <td><?= $m['tanggal_daftar'] ?></td>
            <td class="actions">
                <a href="index.php?page=update_member&id_member=<?= $m['id_member'] ?>" class="btn btn-update">Update</a>
            </td>
            <td>
                <a href="index.php?page=delete_member&id_member=<?= $m['id_member'] ?>" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus member ini?');">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>