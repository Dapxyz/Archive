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

	</thead>
	<?php require_once('navbar.php'); ?>

	<section>
		<?php $header = "Data Penjualan";
		require_once('header.php'); ?>
		<table>
			<thead>
				<tr>
					<th>No</th>
					<th>Jenis Kue</th>
					<th>Tanggal Pengiriman</th>
					<th>Jumlah</th>
					<th>Total</th>
				</tr>
			</thead>
			<?php
			include("koneksi.php");
			$_GET['totalQty'] = 0;
			$no = 1;
			$totalQty = 0;
			$totalPrice = 0;
			$data = mysqli_query($koneksi, "SELECT 
			pesan.id, 
			pesan.cakeType, 
			pesan.quantity, 
			pesan.deliveryDate, 
			pesan.price, 
			pesan.message, 
			pengiriman.metode_pembayaran, 
			pengiriman.resi, 
			pengiriman.status
		FROM pesan
		LEFT JOIN pengiriman ON pesan.id = pengiriman.id
		WHERE pengiriman.status = 'Terkirim';
				
			");
			while ($r = mysqli_fetch_array($data)) {
				$id = $r['id'];
				$cakeType = $r['cakeType'];
				$quantity = $r['quantity'];
				$deliveryDate = $r['deliveryDate'];
				$price = $r['price'];
				$formattedPrice = number_format($r['price'], 0, ',', '.'); // Format angka dengan pemisah ribuan
				$message = $r['message'];
				$status = $r['status'];
				$totalPrice += $price;
				$totalQty += $totalQty + $quantity;
			?>
				<tbody>
					<tr>
						<td class="column-number""><?php echo $no++; ?></td>
	<td class=" column-cakeType""><?php echo $cakeType; ?></td>
						<td class="column-deliveryDate"><?php echo $deliveryDate; ?></td>
						<td class="column-quantity"><?php echo $quantity; ?></td>
						<td class="column-price"><?php echo $formattedPrice; ?></td>
					</tr>
				<?php
			}
				?>
				<?php $formattedTotalPrice = number_format($totalPrice, 0, ',', '.'); ?>


				</tbody>
				<tr style="background-color: #d7d7e0">
					<td class="column-total" style="text-align: center;" colspan="3"><b>Total Penjualan</b></td>
					<td class="column-quantity""><?php echo $totalQty; ?></td>
  <td class=" column-priceTotal"><?php echo $formattedTotalPrice; ?></td>
				</tr>
		</table>
		<div class="download-invoice">
			<button type="button"><a href="invoice.php" style="text-decoration: none; color: white;">Cetak Laporan</button>
		</div>
		<br>
		<br>
		<br>
		<br>
		<br>
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