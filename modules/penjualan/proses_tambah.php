<?php
require_once '../../config/config.php';
if (isset($_POST['submit'])) {
   $tanggal = htmlspecialchars($_POST['tanggal']);
   $pelanggan = htmlspecialchars($_POST['pelanggan']);
   $pulsa =  htmlspecialchars($_POST['pulsa']);
   $harga = htmlspecialchars($_POST['harga']);

   $query = $conn->query("INSERT INTO penjualan (tanggal, pelanggan, pulsa, jumlah_bayar) VALUES ('$tanggal', '$pelanggan', '$pulsa', '$harga')");

   if ($query) {
      session_start();
      $_SESSION['alert'] = 'Melakukan transaksi baru.';
   } else {
      session_start();
      $_SESSION['alert'] = 'Melkukan transaksi.';
   }
   header('location:../../index.php?module=penjualan');
}
