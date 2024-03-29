<?php
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"]) && isset($_GET["status"])) {
    $id = $_GET["id"];
    $status = $_GET["status"];
    $updateQuery = "UPDATE pengiriman SET status = '$status' WHERE id = $id";
    $result = mysqli_query($koneksi, $updateQuery);
    if ($result) {
        echo "<script>alert('Telah sampai ditujuan')</script>";
        header("Location: laporan.php");
    } else {
        echo "<script>alert('Gagal memperbarui status.')</script>";
        header("Location: laporan.php");
    }
} else {
    echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
    header("Location: laporan.php");
}
?>
