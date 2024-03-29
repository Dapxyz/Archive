<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BOLU IBU KOKOM</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
	<!-- loader -->
	<div class="bg-loader">
		<div class="loader"></div>
	</div>

	<!-- header -->
	<div class="medsos">
		<div class="container">
			<ul>
				<li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
				<li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
				<li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
				<ul>
		</div>
	</div>

	<?php require_once('navbar.php'); ?>

	<section style="height: max-content;">

	<div class="atas">
		<h1>Tambah Pesanan</h1>
			<a class="button" href='order.php' style='text-decoration : none'>Kembali</a>
	</div>

		<div class="kotak">
			<form action="tambah-order.php" method="POST">
				<label for="cakeType">Pilih Jenis Kue:</label>
				<select id="cakeType" name="cakeType" required>
					<option value="Bolu Pisang">Bolu Pisang</option>
					<option value="Bolu Original">Bolu Original</option>
					<option value="Bolu Ketan">Bolu Ketan</option>
					<option value="Bolu Pandan">Bolu Pandan</option>
				</select>

				<label for="quantity">Jumlah:</label>
				<input type="number" id="quantity" name="quantity" min="1" required>

				<label for="deliveryDate">Tanggal Pengiriman:</label>
				<input type="date" id="deliveryDate" name="deliveryDate" required>

				<label for="price">Harga:</label>
				<input type="number" id="price" name="price" min="1">

				<label for="pembayaran">Pilih Jenis Pembayaran :</label>
				<select id="pembayaran" name="pembayaran" required>
					<option value="Transfer Bank">Transfer Bank</option>
					<option value="COD">COD</option>
				</select>

				<label for="message">Pesan Khusus:</label>
				<textarea id="message" name="message" rows="3"></textarea>
        
        <label for="alamat">Alamat Lengkap :</label>
        <textarea id="alamat" name="alamat" rows="3"> </textarea>

				<button type="submit" name="submit">PESAN SEKARANG</button>
			</form>
		</div>
		<br />
		<br />

		<?php
include("koneksi.php");

if (isset($_POST['submit'])) {
    $cakeType = $_POST['cakeType'];
    $quantity = $_POST['quantity'];
    $deliveryDate = $_POST['deliveryDate'];
    $price = $_POST['price'];
    $pembayaran = $_POST['pembayaran'];
    $message = $_POST['message'];
    $alamat = $_POST['alamat'];
    $status = "Dikemas";
		$resi = 'RS' . rand(100000, 999999);

    $tambah_order = "INSERT INTO pesan VALUES(NULL,'$cakeType', '$quantity', '$deliveryDate', '$price', '$message', '$alamat')";
    $kerjakan = mysqli_query($koneksi, $tambah_order);

    $id_pesan_baru = mysqli_insert_id($koneksi);

    $pengiriman = "INSERT INTO pengiriman VALUES('$id_pesan_baru', '$pembayaran', '$resi' , '$deliveryDate', '$status', '$alamat')";

    if ($kerjakan && mysqli_query($koneksi, $pengiriman)) {
        echo "Pesanan Berhasil Ditambahkan. <a href='order.php' style='text-decoration : none'>Lihat Data Pesanan</a>";
        header("location: order.php");
    } else {
        echo "Gagal Gais";
    }
}
?>


	</section>

	<footer >
			<small>Copyright &copy; 2024 - Bolu ibu kokom. All Rights Reserved.</small>
	</footer>


	<script type="text/javascript">
		$(document).ready(function() {
			$(".bg-loader").hide();
		})
	</script>
</body>

</html>