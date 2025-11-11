<?php
require_once 'class/Film.php';
$film = new Film();

if (isset($_GET['id_film'])) {
    $film->deleteFilm($_GET['id_film']);
}
header("Location: index.php?page=films");
exit;
