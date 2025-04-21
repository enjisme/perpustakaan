<?php
session_start();
if ($_SESSION['user']['role'] !== 'admin') header("Location: ../login.php");
include '../db.php';
?>
<!DOCTYPE html>
<html>
<head><title>Dasbor Admin</title></head>
<body>
    <h2>Dasbor Admin</h2>
    <a href="buku.php">Kelola Buku</a> | <a href="member.php">Kelola Member</a>
    <h3>Katalog Buku</h3>
    <?php
    $result = $conn->query("SELECT * FROM buku");
    while ($row = $result->fetch_assoc()) {
        echo "{$row['judul']} oleh {$row['penulis']} <br>";
    }
    ?>
</body>
</html>
