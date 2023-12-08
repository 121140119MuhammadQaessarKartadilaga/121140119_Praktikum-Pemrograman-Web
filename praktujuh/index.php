<?php
include 'koneksi.php';

$queryProdi = "SELECT kode_prodi, nama_prodi FROM prodi";
$resultProdi = $conn->query($queryProdi);

if (isset($_POST['search'])) {
    $prodi = $_POST['prodi'];
    if ($prodi === 'all') {
        $sql = "SELECT * FROM mahasiswa";
    } else {
        $sql = "SELECT * FROM mahasiswa WHERE Kode_Prodi = $prodi";
    }
} else{
    $sql = "SELECT * FROM mahasiswa";
}

$result = $conn->query($sql);
?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manajemen Data Mahasiswa</title>
    <link rel="stylesheet" href="./style.css" />
  </head>
<body>
<div class = "container">
    <h1>Data Mahasiswa</h1>

    <form method="POST" action="">
        <label>Cari berdasarkan Prodi:</label>
        <select name="prodi">
        <option value="all">-- Pilih Nama Prodi --</option>
        <?php
            while ($rowProdi = $resultProdi->fetch_assoc()) {
                echo "<option value='" . $rowProdi['kode_prodi'] . "'>" . $rowProdi['kode_prodi'] . " - " . $rowProdi['nama_prodi'] . "</option>";
            }
            ?>
        </select>
        <input type="submit" name="search" value="Cari">
    </form>

    <table border="1">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Kode Prodi</th>
            <th>Aksi</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['NIM'] . "</td>";
                echo "<td>" . $row['Nama'] . "</td>";
                echo "<td>" . $row['Kode_Prodi'] . "</td>";
                echo "<td><a href='edit.php?nim=" . $row['NIM'] . "'>Edit</a> | <a href='delete.php?nim=" . $row['NIM'] . "'>Hapus</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Tidak ada data</td></tr>";
        }
        ?>
    </table>
    </div>
    <a href="add_mahasiswa.php">Tambah Data Mahasiswa</a>
    <a href="add_prodi.php">Tambah Data Prodi</a>

</body>
</html>
