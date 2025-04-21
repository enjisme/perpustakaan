<?php
session_start();
include '../db.php';

if ($_POST) {
    if ($_POST['aksi'] == 'tambah') {
        $judul = $_POST['judul'];
        $penulis = $_POST['penulis'];
        $cover = $_FILES['cover']['name'];
        move_uploaded_file($_FILES['cover']['tmp_name'], "../cover/$cover");
        $conn->query("INSERT INTO buku (judul, penulis, cover) VALUES ('$judul', '$penulis', '$cover')");
    } elseif ($_POST['aksi'] == 'hapus') {
        $id = $_POST['id'];
        $conn->query("DELETE FROM buku WHERE id=$id");
    }
}
?>
<h2>Kelola Buku</h2>
<form method="POST" enctype="multipart/form-data">
    <input type="hidden" name="aksi" value="tambah">
    Judul: <input type="text" name="judul"><br>
    Penulis: <input type="text" name="penulis"><br>
    Cover: <input type="file" name="cover"><br>
    <button type="submit">Tambah</button>
</form>
<h3>Daftar Buku</h3>
<?php
$data = $conn->query("SELECT * FROM buku");
while ($row = $data->fetch_assoc()) {
    echo "{$row['judul']} - {$row['penulis']}
          <form method='POST' style='display:inline'>
            <input type='hidden' name='aksi' value='hapus'>
            <input type='hidden' name='id' value='{$row['id']}'>
            <button type='submit'>Hapus</button>
          </form><br>";
}
?>
