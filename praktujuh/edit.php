<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $kode_prodi = $_POST['kode_prodi'];

    $sql = "UPDATE mahasiswa SET Nama='$nama', Kode_Prodi=$kode_prodi WHERE NIM=$nim";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $nim = $_GET['nim'];
    $sql = "SELECT * FROM mahasiswa WHERE NIM=$nim";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="./style.css" />
  </head>
<body>
    <h2>Edit Data Mahasiswa</h2>
    <form method="POST" action="">
        <input type="hidden" name="nim" value="<?php echo $row['NIM']; ?>">
        Nama: <input type="text" name="nama" value="<?php echo $row['Nama']; ?>"><br>
        Kode Prodi: <input type="text" name="kode_prodi" value="<?php echo $row['Kode_Prodi']; ?>"><br>
        <input type="submit" value="Simpan">
    </form>
</body>
</html>
