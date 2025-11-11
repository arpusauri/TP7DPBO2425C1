<?php
require_once 'class/Member.php';
$member = new Member();

if (isset($_GET['id_member'])) {
    $member->deleteMember($_GET['id_member']);
}
header("Location: index.php?page=members");
exit;
