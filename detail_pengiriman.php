<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengiriman</title>
</head>
<body>
    <!-- Your HTML content here -->

    <?php
    // Ambil status pengiriman dari parameter GET
    $status = $_GET['status'];

    // Tentukan pesan alert berdasarkan status pengiriman
    $alert_message = '';
    if ($status == 'Dikemas') {
        $alert_message = "Pesanan sudah diproses oleh admin dan akan segera dikirim.";
    } elseif ($status == 'Dikirim') {
        $alert_message = "Pesanan Anda sedang dalam perjalanan. Mohon bersabar karena sedang dalam proses pengiriman oleh kurir.";
    } elseif ($status == 'Terkirim') {
        $alert_message = "Pesanan sudah terkirim. Terima kasih atas orderannya. Semoga sehat selalu dan menjadi langganan ya :)";
    }

    // Tampilkan alert jika pesan tidak kosong
    if (!empty($alert_message)) {
        echo "<script>alert('$alert_message');</script>";
    }
    ?>

</body>
</html>
