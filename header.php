<div class="atas">
		<h1><?=$header?></h1>
		<div>
      <a class="button" href='tambah-order.php' style='text-decoration : none'>Tambah Pesanan Baru</a>
			<a class="button" href='laporan.php' style='text-decoration : none'>Laporan Pengiriman</a>
      <?php
        if ($user == "admin") {
            echo "<a class='button' href='penjualan.php' style='text-decoration : none'>Laporan Penjualan</a>";
        }
        ?>
		</div>
	</div>