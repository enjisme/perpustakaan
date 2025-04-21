<?php
session_start();
if ($_SESSION['user']['role'] !== 'member') header("Location: ../login.php");
include '../db.php';
?>
<h2>Dasbor Member</h2>
<h3>Katalog Buku</h3>
<?php
$result = $conn->query("SELECT * FROM buku");
while ($row = $result->fetch_assoc()) {
    echo "{$row['judul']} oleh {$row['penulis']}<br>";
}
?>
