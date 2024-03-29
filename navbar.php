<?php
$url = basename($_SERVER['SCRIPT_NAME']);
session_start();
$user = isset($_SESSION['username']) ? $_SESSION['username'] : null;

if (!isset($_SESSION['username'])) {
  header("Location: ./auth/index.php");
  exit();
}
$nama = "BOLU IBU KOKOM";
function isLinkActive($page, $currentUrl)
{
  if (
    $page === $currentUrl
    || ($currentUrl === "laporan.php" && $page === "order.php")
    || ($currentUrl === "penjualan.php" && $page === "order.php")
  ) {
    return 'class="active"';
  } else {
    return '';
  }
}

?>
<header>
  <div class="container">
    <h1><a href="index.php"><?= $nama ?></a></h1>
    <span class="welcome"><b>Welcome </b><?= $user ?></span>
    <ul>
      <li <?= isLinkActive('index.php', $url) ?>><a style="color: white;" href="index.php">HOME</a></li>
      <li <?= isLinkActive('order.php', $url) ?>><a style="color: white;" href="order.php">ORDER</a></li>
      <li <?= isLinkActive('contact.php', $url) ?>><a style="color: white;" href="contact.php">CONTACT</a></li>
      <a class="logout" href="./auth/logout.php" style="text-decoration: none; font-weight: bold">Logout </a>
    </ul>
  </div>
  <div class="download-invoice">
  </div>
</header>