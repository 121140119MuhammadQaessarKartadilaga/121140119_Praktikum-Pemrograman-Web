<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $kodeProdi = $_POST['kode_prodi'];
        $namaProdi = $_POST['nama_prodi'];

        $sql = "INSERT INTO prodi (kode_prodi, nama_prodi) VALUES ($kodeProdi, '$namaProdi')";
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Data Prodi</title>
    <link rel="stylesheet" href="./style.css" />
  </head>
<body>
<div class = "container">
    <h2>Tambah Data Prodi</h2>
    <form method="POST" action="">
        Kode Prodi: <input type="text" name="kode_prodi"><br>
        Nama Prodi: <input type="text" name="nama_prodi"><br>
        <input type="submit" value="Tambah">
    </form>
</div>
</body>
</html>