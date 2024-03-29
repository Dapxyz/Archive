<?php
// Sambungkan ke database
include 'koneksi.php';

// Periksa apakah permintaan POST berisi data product_id
if(isset($_POST['product_id'])) {
    // Ambil product_id dari permintaan POST
    $product_id = $_POST['product_id'];

    // Lakukan query untuk mengambil stok produk berdasarkan product_id
    $query = "SELECT stok FROM products WHERE id = '$product_id'";
    $result = mysqli_query($koneksi, $query);

    // Periksa apakah query berhasil dieksekusi
    if($result) {
        // Ambil stok produk dari hasil query
        $row = mysqli_fetch_assoc($result);
        $current_stock = $row['stok'];

        // Periksa apakah stok produk cukup untuk dikurangi
        if($current_stock > 0) {
            // Kurangi stok produk
            $updated_stock = $current_stock - 1;

            // Lakukan query untuk mengupdate stok produk di database
            $update_query = "UPDATE products SET stok = '$updated_stock' WHERE id = '$product_id'";
            $update_result = mysqli_query($koneksi, $update_query);

            // Periksa apakah query update berhasil dieksekusi
            if($update_result) {
                // Kirimkan respons ke client bahwa stok telah berhasil diperbarui
                echo "success";
            } else {
                // Kirimkan respons ke client jika terjadi kesalahan saat mengupdate stok
                echo "error";
            }
        } else {
            // Kirimkan respons ke client jika stok produk habis
            echo "out_of_stock";
        }
    } else {
        // Kirimkan respons ke client jika terjadi kesalahan saat mengambil stok produk dari database
        echo "error";
    }
} else {
    // Kirimkan respons ke client jika data product_id tidak diterima dari permintaan POST
    echo "invalid_request";
}
?>
