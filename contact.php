<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
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
	<?php $nama = "Bolu Ibu Kokom"; require_once('navbar.php'); ?>


	<!-- label -->
	<section class="label">
		<div class="container">
			<p>Home / Contact</p>
		</div>
	</section>

	<!-- service -->
	<section class="service">
		<div class="container">
			<h3>CONTACT INFO</h3>
			<div class="box">
				<div class="col-4">
					<h4>Address</h4>
					<p>Jl. Panca Desa.Nagrak Kecamatan.Pacet Kabupaten.Bandung 40385</p>
				</div>
				<div class="col-4">
					<h4>Email</h4>
					<p>Boluibukokom@rocketmail.com</p>
				</div>
				<div class="col-4">
					<h4>Instagram</h4>
					<p>@_boluibukokom_</p>
				</div>
				<div class="col-4">
					<h4>Hp / Whatsapp</h4>
					<p>081324584831</p>
				</div>
			</div>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31673.247875489003!2d107.70696280546936!3d-7.1079148434056885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68bfe4cb9d0b11%3A0x14e3546d36647760!2sdapur%20seblak%20DIVA!5e0!3m2!1sid!2sid!4v1697035856110!5m2!1sid!2sid" width="100%" height="450%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
	</section>

	<!-- footer -->
	<footer >
			<small>Copyright &copy; 2024 - Bolu ibu kokom. All Rights Reserved.</small>
	</footer>


	<script type="text/javascript">
		$(document).ready(function(){
			$(".bg-loader").hide();
		})
	</script>
</body>
</html>