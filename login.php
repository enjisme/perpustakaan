<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $q = $conn->query("SELECT * FROM user WHERE username='$username' AND password='$password'");
    $user = $q->fetch_assoc();

    if ($user) {
        $_SESSION['user'] = $user;
        if ($user['role'] === 'admin') {
            header('Location: admin/dasbor_admin.php');
        } else {
            header('Location: member/dasbor_member.php');
        }
    } else {
        echo "Login gagal!";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
    <h2>Login</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
