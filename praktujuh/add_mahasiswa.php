<?php
include 'koneksi.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $nama_prodi = $_POST['nama_prodi'];

    if (empty($nim) || empty($nama) || empty($nama_prodi)) {
        $error = "Harap isi semua field!";
    } else {
        $checkNIM = "SELECT * FROM mahasiswa WHERE NIM = '$nim'";
        $resultNIM = $conn->query($checkNIM);
        if ($resultNIM->num_rows > 0) {
            $error = "NIM sudah ada dalam database!";
        }

        $getKodeProdi = "SELECT kode_prodi FROM prodi WHERE nama_prodi = '$nama_prodi'";
        $resultKodeProdi = $conn->query($getKodeProdi);
        if ($resultKodeProdi->num_rows == 0) {
            $error = "Nama Prodi tidak ditemukan!";
        }

        if (empty($error)) {

                $row = $resultKodeProdi->fetch_assoc();
                $kode_prodi = $row['kode_prodi'];
        
                $sql = "INSERT INTO mahasiswa (NIM, Nama, Kode_Prodi) VALUES ('$nim', '$nama', '$kode_prodi')";
                if ($conn->query($sql) === TRUE) {
                    header("Location: index.php");
                    exit();
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
        
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Data Mahasiswa</title>
    <link rel="stylesheet" href="./style.css" />
  </head>
<body>
<div class = "container">
    <h2>Tambah Data Mahasiswa</h2>

    <form method="POST" action="">
        NIM: <input type="text" name="nim"><br>
        Nama: <input type="text" name="nama"><br>
        nama Prodi: <input type="text" name="nama_prodi"><br>
        <input type="submit" value="Tambah">
    </form>
    <?php
    if (!empty($error)) {
        echo "<p style='color:red;'>$error</p>";
    }
    ?>
    </div>
</body>
</html>