<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <title>Katalog Buku</title>
</head>
<body>
    <h1>Katalog Buku</h1>
    <div class="grid">
        <?php
        $result = $conn->query("SELECT * FROM buku");
        while ($row = $result->fetch_assoc()) {
            echo "<div class='book'>
                    <img src='cover/{$row['cover']}' alt='Cover'>
                    <h3>{$row['judul']}</h3>
                    <p>{$row['penulis']}</p>
                  </div>";
        }
        ?>
    </div>
</body>
</html>
