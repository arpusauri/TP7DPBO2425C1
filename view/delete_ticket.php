<?php
require_once 'class/Ticket.php';
$ticket = new Ticket();

if (isset($_GET['id_tiket'])) {
    $ticket->deleteTicket($_GET['id_tiket']);
}
header("Location: index.php?page=tickets");
exit;
