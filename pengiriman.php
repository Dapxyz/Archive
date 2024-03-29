<?php
include("koneksi.php");
$no = 1;
$data = mysqli_query($koneksi, "select * from pesan where id='$_GET[id]'");
while ($r = mysqli_fetch_array($data)) {
  $id = $r['id'];
  $cakeType = $r['cakeType'];
  $quantity = $r['quantity'];
  $deliveryDate = $r['deliveryDate'];
  $price = $r['price'];
  $message = $r['message'];
  $alamat = $r['alamat'];
}

$bayar = mysqli_query($koneksi, "select * from pengiriman where id='$_GET[id]'");
while ($r = mysqli_fetch_array($bayar)) {
  $id = $r['id'];
  $pembayaran = $r['metode_pembayaran'];
  $resi = $r['resi'];
  $deliveryDate = $r['deliveryDate'];
  $status = $r['status'];
  $alamat = $r['alamat'];
}

if (isset($_POST['submit'])) {
  $currentDate = date('Y-m-d');
  $status = 'Dikirim';
  $resi = 'RS' . rand(100000, 999999);
  $update_pengiriman = "UPDATE pengiriman SET metode_pembayaran='$pembayaran', resi='$resi', deliveryDate='$currentDate', status='$status', alamat='$alamat' WHERE id='$id'";
  $kerjakan = mysqli_query($koneksi, $update_pengiriman);
  if ($kerjakan) {
    echo "<script>alert('Pengiriman Berhasil'); window.location.href = 'laporan.php';</script>";
    // header("location: order.php");
  } else {
    echo "Gagal Gais";
  }
  var_dump($_POST['pembayaran'], $id);
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

  <?php require_once('navbar.php'); ?>

  <section>
    <?php $header = "Pembayaran";
    require_once('header.php'); ?>
    <div class="kotak">
      <form action="" method="POST">
        <p>Metode Pembayaran : <?php echo $pembayaran; ?></p>
        <p>Nama Penerima : <?php echo $user; ?></p>
        <p>Jenis Kue : <?php echo $cakeType; ?></p>
        <p>Jumlah : <?php echo $quantity; ?></p>
        <p>Tanggal Pengiriman : <?= $deliveryDate; ?></p>
        <p>Harga : <?php echo $price; ?></p>
        <p>Pesan : <?php echo $message; ?></p>
        <p>Alamat : <?php echo $alamat; ?></p>
        <button type="submit" name="submit">Kirim</button>
      </form>
    </div>
    <br />
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