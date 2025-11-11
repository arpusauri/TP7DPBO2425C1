<?php
require_once 'class/Ticket.php';
require_once 'class/Member.php';
require_once 'class/Film.php';

$ticket = new Ticket();
$member = new Member();
$film = new Film();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Layar Bioskop 21</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include 'view/header.php'; ?>
    <main>
        <h2>Welcome to LB21 Dashboard</h2>
        <nav>
            <a href="?page=tickets">Tickets</a> |
            <a href="?page=members">Members</a> |
            <a href="?page=films">Films</a>
        </nav>

        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            switch ($page) {
                // Tickets
                case 'tickets':
                    include 'view/tickets.php';
                    break;
                case 'add_ticket':
                    include 'view/add_ticket.php';
                    break;
                case 'update_ticket':
                    include 'view/update_ticket.php';
                    break;
                case 'delete_ticket':
                    include 'view/delete_ticket.php';
                    break;

                // Films
                case 'films':
                    include 'view/films.php';
                    break;
                case 'add_film':
                    include 'view/add_film.php';
                    break;
                case 'update_film':
                    include 'view/update_film.php';
                    break;
                case 'delete_film':
                    include 'view/delete_film.php';
                    break;

                // Members
                case 'members':
                    include 'view/members.php';
                    break;
                case 'add_member':
                    include 'view/add_member.php';
                    break;
                case 'update_member':
                    include 'view/update_member.php';
                    break;
                case 'delete_member':
                    include 'view/delete_member.php';
                    break;

                default:
                    echo "<p>Page not found.</p>";
                    break;
            }
        }
        ?>
    </main>
    <?php include 'view/footer.php'; ?>
</body>

</html>