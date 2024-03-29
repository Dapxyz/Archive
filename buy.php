<?php
require_once('navbar.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productName = $_POST['product'];

    // Check if the product exists
    if (isset($products[$productName])) {
        // Check if the product is in stock
        if ($products[$productName]['stock'] > 0) {
            // Reduce stock
            $products[$productName]['stock']--;

            // Update session or database to reflect the change in stock

            // Show success message
            echo "<p>Thank you for your purchase of $productName!</p>";
        } else {
            // Show out of stock message
            echo "<p>$productName is out of stock!</p>";
        }
    } else {
        // Show error message for invalid product
        echo "<p>Invalid product!</p>";
    }
}
?>
