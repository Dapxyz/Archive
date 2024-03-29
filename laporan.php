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

  <?php require_once('navbar.php'); ?>

  <section>

    <?php $header = "Data Pengiriman";
    require_once('header.php'); ?>
    <div class="container-table">
      <table>
        <thead>
          <tr>
            <th>No</th>
            <th>Jenis Kue</th>
            <th>Jumlah</th>
            <th>Tanggal Pengiriman</th>
            <th>Harga</th>
            <th>Pesan Khusus</th>
            <th>Metode Pembayaran</th>
            <th>Resi</th>
            <th>Status</th>
          </tr>
        </thead>

        <?php
        include("koneksi.php");
        $no = 1;
        $data = mysqli_query($koneksi, "SELECT 
      pesan.id, 
      pesan.cakeType, 
      pesan.quantity, 
      pesan.deliveryDate, 
      pesan.price, 
      pesan.message, 
      pengiriman.metode_pembayaran, 
      pengiriman.resi, 
      pengiriman.deliveryDate,
      pengiriman.status
      FROM pesan
      JOIN pengiriman 
      ON pesan.id = pengiriman.id");

        while ($r = mysqli_fetch_array($data)) {
          $id = $r['id'];
          $cakeType = $r['cakeType'];
          $quantity = $r['quantity'];
          $deliveryDate = $r['deliveryDate'];
          $price = $r['price'];
          $message = $r['message'];
          $metodePembayaran = $r['metode_pembayaran'];
          $resi = $r['resi'];
          $status = $r['status'];
        ?>
          <tbody>

            <tr>
              <td class="column-number"><?php echo $no++; ?></td>
              <td class="column-cakeType"><?php echo $cakeType; ?></td>
              <td class="column-quantity"><?php echo $quantity; ?></td>
              <td class="column-deliveryDate"><?php echo $deliveryDate; ?></td>
              <td class="column-price"><?php echo $price; ?></td>
              <td class="column-message"><?php echo $message; ?></td>
              <td class="column-metodePembayaran"><?php echo $metodePembayaran; ?></td>
              <td class="column-resi"><?php if ($status == "Dikemas") {
                                        echo "-";
                                      } else {
                                        echo $resi;
                                      }
                                      ?></td>
              <td class="column-status">
                <?php
                if ($status == "Terkirim") {
                ?>
                  <span style="color: forestgreen"><?= $status ?></span>
                  <?php
                } else if ($status == "Dikirim") {
                  if ($user === "admin") {
                  ?>
                    <a style="color: darkgoldenrod" href='update-status.php?id=<?= $id ?>&status=Terkirim'><?= $status ?></a>
                  <?php } else {
                  ?>
                    <span style="color: darkgoldenrod"><?= $status ?></span>
                  <?php
                  }
                } else if ($status == "Dikemas") {
                  if ($user === "admin") { ?>
                    <a href='pengiriman.php?id=<?= $id ?>&status=Terkirim'>Kirim</a>
                  <?php
                  } else {
                  ?>
                    <span style="color: darkgoldenrod"><?= $status ?></span>
              <?php }
                }
              }
              ?>
              </td>
            </tr>
          </tbody>
      </table>
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