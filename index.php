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
            </ul>
        </div>
    </div>

    <?php $nama = "BOLU IBU KOKOM"; require_once('navbar.php'); ?>

    <section>
	<div class="kotak">
    <div class="product" id="bolu_pisang" data-stok="20">
        <img src="img/df83e9f4-8e43-4689-a2e4-5846bcf598c2.jpg">
        <h3>BOLU PISANG</h3>
        <p>Rp.20.000.</p>
		<p>Stok: 0 PCS</p>
        <button onclick="order('bolu_pisang')">Cek stok</button>
        <a href="tambah-order.php"><button>Order Now</button></a>
    </div>

    <div class="product" id="bolu_original" data-stok="15">
        <img src="img/bolu-tape-panggang-topping-keju-foto-resep-utama.jpg">
        <h3>BOLU ORIGINAL</h3>
        <p>Rp.20.000.</p>
        <p>Stok: 15 PCS</p>
        <button onclick="order('bolu_original')">Cek stok</button>
        <button onclick="order('bolu_original')">Order Now</button>
    </div>

    <div class="product" id="bolu_ketan" data-stok="8">
        <img src="img/1721191952278348-bolu-ketan-hitam-panggang.jpg">
        <h3>BOLU KETAN</h3>
        <p>Rp.27.000.</p>
        <p>Stok: 8 PCS</p>
        <button onclick="order('bolu_ketan')">Cek stok</button>
        <button onclick="order('bolu_ketan')">Order Now</button>
    </div>

    <div class="product" id="bolu_pandan" data-stok="12">
        <img src="img/WhatsApp Image 2023-12-12 at 21.36.52_4f7736d0.jpg">
        <h3>BOLU PANDAN</h3>
        <p>Rp.20.000.</p>
        <p>Stok: 12 PCS</p>
        <button onclick="order('bolu_pandan')">Cek stok</button>
        <button onclick="order('bolu_pandan')">Order Now</button>
    </div>
</div>
    </section>

    <!-- footer -->
    <footer>
        <small>Copyright &copy; 2024 - Bolu ibu Kokom. All Rights Reserved.</small>
    </footer>

    <script type="text/javascript">
        function order(product_id) {
            var product = document.getElementById(product_id);
            var stok = parseInt(product.getAttribute('data-stok'));
            if (stok > 0) {
                stok -= 1; 
                product.setAttribute('data-stok', stok);
                alert('Stok tersedia, silahkan order!');
            } else {
                alert('Maaf, stok habis.');
            }
        }

        $(document).ready(function(){
            $(".bg-loader").hide();
        });
    </script>
</body>
</html>
