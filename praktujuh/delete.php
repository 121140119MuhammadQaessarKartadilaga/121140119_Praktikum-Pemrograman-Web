<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $nim = $_GET['nim'];

    $sql = "DELETE FROM mahasiswa WHERE NIM=$nim";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
