<?php
include '../db.php';
if ($_POST) {
    if ($_POST['aksi'] == 'tambah') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $conn->query("INSERT INTO user (username, password, role) VALUES ('$username', '$password', 'member')");
    } elseif ($_POST['aksi'] == 'hapus') {
        $id = $_POST['id'];
        $conn->query("DELETE FROM user WHERE id=$id");
    }
}
?>
<h2>Kelola Member</h2>
<form method="POST">
    <input type="hidden" name="aksi" value="tambah">
    Username: <input type="text" name="username"><br>
    Password: <input type="text" name="password"><br>
    <button type="submit">Tambah Member</button>
</form>
<h3>Daftar Member</h3>
<?php
$data = $conn->query("SELECT * FROM user WHERE role='member'");
while ($row = $data->fetch_assoc()) {
    echo "{$row['username']}
          <form method='POST' style='display:inline'>
            <input type='hidden' name='aksi' value='hapus'>
            <input type='hidden' name='id' value='{$row['id']}'>
            <button type='submit'>Hapus</button>
          </form><br>";
}
?>
