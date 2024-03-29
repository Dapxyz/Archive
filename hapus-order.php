<?php
include("koneksi.php");
$id = $_GET['id'];

// Hapus terlebih dahulu dari tabel anak (pengiriman)
mysqli_query($koneksi, "DELETE FROM pengiriman WHERE id=$id");

// Setelah itu baru hapus dari tabel induk (pesan)
mysqli_query($koneksi, "DELETE FROM pesan WHERE id=$id");

header("location: order.php");
?>
