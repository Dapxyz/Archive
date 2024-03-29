<?php
include("koneksi.php");
if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$cakeType = $_POST['cakeType'];
	$quantity = $_POST['quantity'];
	$deliveryDate = $_POST['deliveryDate'];
	$price = $_POST['price'];
	$message = $_POST['message'];

	$result = mysqli_query($koneksi, "UPDATE pesan SET cakeType='$cakeType', quantity='$quantity', deliveryDate=
		'$deliveryDate', price='$price', message='$message'  WHERE id='$id'");

	header("location: order.php");
}
?>

<?php
include("koneksi.php");
$id = $_GET['id'];

$result = mysqli_query($koneksi, "SELECT * FROM pesan WHERE id=$id");

while ($r = mysqli_fetch_array($result)) {
	$cakeType = $r['cakeType'];
	$quantity = $r['quantity'];
	$deliveryDate = $r['deliveryDate'];
	$price = $r['price'];
	$message = $r['message'];
}
?>

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
	<header>
		<div class="container">
			<h1><a href="index.php">BOLU IBU KOKOM</a></h1>
			<ul>
				<li><a href="index.php">HOME</a></li>
				<li class="active"><a href="order.php">ORDER</a></li>
				<li><a href="service.html">SERVICE</a></li>
				<li><a href="contact.html">CONTACT</a></li>
				<ul>
		</div>
	</header>

	<section>
		<div class="atas">
			<h1>Buat Pesanan</h1>
			<a href='order.php' style='text-decoration : none'>Kembali</a>
		</div>
		<div class="kotak">
			<form action="edit-order.php" method="post" name="update_user">
				<table border="0">
					<tr>
						<td><label for="cakeType">Pilih Jenis Kue:</label></td>
						<td>
							<select id="cakeType" name="cakeType" required>
								<option value="Bolu Pisang" <?php echo ($cakeType == 'Bolu Pisang') ? 'selected' : ''; ?>>Bolu Pisang</option>
								<option value="Bolu Original" <?php echo ($cakeType == 'Bolu Original') ? 'selected' : ''; ?>>Bolu Original</option>
								<option value="Bolu Ketan" <?php echo ($cakeType == 'Bolu Ketan') ? 'selected' : ''; ?>>Bolu Ketan</option>
								<option value="Bolu Pandan" <?php echo ($cakeType == 'Bolu Pandan') ? 'selected' : ''; ?>>Bolu Pandan</option>
							</select>

						</td>
					</tr>
					<tr>
						<td>Jumlah</td>
						<td><input type="text" name="quantity" size="50" value=<?php echo $quantity; ?>></td>
					</tr>
					<tr>
						<td>Tanggal Pengiriman</td>
						<td><input type="text" name="deliveryDate" size="50" value="<?php echo $deliveryDate; ?>"></td>
					</tr>
					<tr>
						<td>Harga</td>
						<td><input type="text" name="price" size="50" value=<?php echo $price; ?>></Harga>
					</tr>
					<tr>
						<td>Pesan Khusus</td>
						<td><input type="text" name="message" size="50" value=<?php echo $message; ?>></Harga>
					</tr>
					<tr>
						<td><input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"></td>
						<td><input type="submit" name="update" value="Update"></td>
					</tr>
				</table>
			</form>
		</div>
		<br />
	</section>

	<footer>
		<small>Copyright &copy; 2024 - Bolu ibu kokom. All Rights Reserved.</small>
	</footer>


	<script type="text/javascript">
		$(document).ready(function() {
			$(".bg-loader").hide();
		})
	</script>
</body>

</html>